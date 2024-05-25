<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\Facades\URL;

/**
 * @method payhereFirstName()
 * @method payhereLastName()
 * @method payhereEmail()
 * @method payherePhone()
 * @method payhereAddress()
 * @method payhereCity()
 * @method payhereCountry()
 */
trait CheckoutFormData
{
    private ?array $recurring = null;

    private bool $preapproval = false;

    private bool $authorize = false;

    private ?string $platform = null;

    private ?int $startupFee = null;

    private ?array $customData = null;

    public function getFormData(): array
    {
        return [
            'customer' => $this->customer(),
            'items' => $this->items(),
            'other' => $this->other(),
            'recurring' => $this->recurring,
            'platform' => $this->platform,
            'startup_fee' => $this->startupFee,
            'custom_1' => $this->customData['custom_1'] ?? null,
            'custom_2' => $this->customData['custom_2'] ?? null,
        ];
    }

    private function customer(): array
    {
        return [
            'first_name' => $this->payhereFirstName(),
            'last_name' => $this->payhereLastName(),
            'email' => $this->payhereEmail(),
            'phone' => $this->payherePhone(),
            'address' => $this->payhereAddress(),
            'city' => $this->payhereCity(),
            'country' => $this->payhereCountry(),
        ];
    }

    private function items(): array
    {
        $relationship = PayHere::$orderLinesRelationship;

        $items = [];

        foreach ($this->order->{$relationship} as $number => $line) {
            $items["item_number_$number"] = $line->payHereOrderLineId();
            $items["item_name_$number"] = $line->payHereOrderLineTitle();
            $items["quantity_$number"] = $line->payHereOrderLineQty();
            $items["amount_$number"] = $line->payHereOrderLineTotal();
        }

        return $items;
    }

    private function other(): array
    {
        return [
            'action' => $this->actionUrl(),
            'merchant_id' => config('payhere.merchant_id'),
            'notify_url' => config('payhere.notify_url') ?? URL::signedRoute('payhere.webhook'),
            'return_url' => config('payhere.return_url') ?? URL::signedRoute('payhere.return'),
            'cancel_url' => config('payhere.cancel_url') ?? url('/'),
            'order_id' => $this->order->id,
            'items' => "Order #{$this->order->id}",
            'currency' => config('payhere.currency'),
            'amount' => $this->order->total,
            'hash' => $this->generateHash(),
        ];
    }

    public function preapproval(): static
    {
        $this->preapproval = true;

        return $this;
    }

    public function authorize(): static
    {
        $this->authorize = true;

        return $this;
    }

    private function actionUrl(): string
    {
        $baseUrl = config('payhere.base_url');

        $action = 'checkout';

        if ($this->preapproval) {
            $action = 'preapprove';
        }

        if ($this->authorize) {
            $action = 'authorize';
        }

        return "$baseUrl/pay/$action";
    }

    public function recurring(string $recurrence, string $duration): static
    {
        $this->recurring = [
            'recurrence' => $recurrence,
            'duration' => $duration,
        ];

        $subscription = $this->subscriptions()->create([
            'user_id' => $this->id,
            'order_id' => $this->order->id,
            'ends_at' => now()->add($duration),
            'trial_ends_at' => $this->trialEndsAt,
        ]);

        $this->customData($subscription->id);

        return $this;
    }

    public function platform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function startupFee(string $fee): static
    {
        $this->startupFee = $fee;

        return $this;
    }

    private function customData(string ...$data): static
    {
        $this->customData = [
            'custom_1' => $data[0] ?? null,
            'custom_2' => $data[1] ?? null,
        ];

        return $this;
    }
}
