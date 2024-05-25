<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\Facades\URL;

/**
 * @method string payhereFirstName()
 * @method string payhereLastName()
 * @method string payhereEmail()
 * @method string payherePhone()
 * @method string payhereAddress()
 * @method string payhereCity()
 * @method string payhereCountry()
 */
trait CheckoutFormData
{
    /**
     * Recurring payment details.
     *
     * @var array|null
     */
    private ?array $recurring = null;

    /**
     * Indicates if preapproval is required.
     *
     * @var bool
     */
    private bool $preapproval = false;

    /**
     * Indicates if authorization is required.
     *
     * @var bool
     */
    private bool $authorize = false;

    /**
     * Platform information.
     *
     * @var string|null
     */
    private ?string $platform = null;

    /**
     * Startup fee amount.
     *
     * @var int|null
     */
    private ?int $startupFee = null;

    /**
     * Custom data for the checkout form.
     *
     * @var array|null
     */
    private ?array $customData = null;

    /**
     * Get the form data for the checkout.
     *
     * @return array
     */
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

    /**
     * Get customer details for the form.
     *
     * @return array
     */
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

    /**
     * Get item details for the form.
     *
     * @return array
     */
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

    /**
     * Get other necessary details for the form.
     *
     * @return array
     */
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

    /**
     * Set preapproval for the payment.
     *
     * @return static
     */
    public function preapproval(): static
    {
        $this->preapproval = true;

        return $this;
    }

    /**
     * Set authorization for the payment.
     *
     * @return static
     */
    public function authorize(): static
    {
        $this->authorize = true;

        return $this;
    }

    /**
     * Generate the action URL for the form.
     *
     * @return string
     */
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

    /**
     * Set recurring payment details.
     *
     * @param string $recurrence The recurrence interval.
     * @param string $duration The duration of the subscription.
     * @return static
     */
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

    /**
     * Set the platform for the form.
     *
     * @param string $platform The platform name.
     * @return static
     */
    public function platform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Set the startup fee for the form.
     *
     * @param string $fee The startup fee amount.
     * @return static
     */
    public function startupFee(string $fee): static
    {
        $this->startupFee = $fee;

        return $this;
    }

    /**
     * Set custom data for the form.
     *
     * @param string ...$data The custom data values.
     * @return static
     */
    private function customData(string ...$data): static
    {
        $this->customData = [
            'custom_1' => $data[0] ?? null,
            'custom_2' => $data[1] ?? null,
        ];

        return $this;
    }
}