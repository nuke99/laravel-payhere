<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\Facades\URL;

trait CheckoutForm
{
    private ?array $recurring = null;

    private ?string $platform = null;

    private ?int $startupFee = null;

    private ?string $customOne = null;

    private ?string $customTwo = null;

    public function getForm(): array
    {
        return array_merge(
            ['customer' => $this->customer()],
            ['items' => $this->items()],
            ['other' => $this->other()],
            ['recurring' => $this->recurring],
            ['platform' => $this->platform],
            ['startup_fee' => $this->startupFee],
            ['custom_1' => $this->customOne],
            ['custom_2' => $this->customTwo],
        );
    }

    private function customer(): array
    {
        $relationship = PayHere::$customerRelationship;

        return [
            'first_name' => $this->order->{$relationship}->payhereFirstName(),
            'last_name' => $this->order->{$relationship}->payhereLastName(),
            'email' => $this->order->{$relationship}->payhereEmail(),
            'phone' => $this->order->{$relationship}->payherePhone(),
            'address' => $this->order->{$relationship}->payhereAddress(),
            'city' => $this->order->{$relationship}->payhereCity(),
            'country' => $this->order->{$relationship}->payhereCountry(),
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
        $baseUrl = config('payhere.base_url');

        return [
            'action' => "$baseUrl/pay/checkout",
            'merchant_id' => config('payhere.merchant_id'),
            'return_url' => config('payhere.return_url'),
            'cancel_url' => config('payhere.cancel_url'),
            'notify_url' => URL::signedRoute('payhere.webhook'),
            'order_id' => $this->order->id,
            'items' => "Order #{$this->order->id}",
            'currency' => config('payhere.currency'),
            'amount' => $this->order->total,
            'hash' => $this->generateHash(),
        ];
    }

    public function recurring(string $recurrence, string $duration): static
    {
        $this->recurring = [
               'recurrence' => $recurrence,
            'duration' => $duration
        ];

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

    public function customOne(string $data): static
    {
        $this->customOne = $data;

        return $this;
    }

    public function customTwo(string $data): static
    {
        $this->customTwo = $data;

        return $this;
    }
}