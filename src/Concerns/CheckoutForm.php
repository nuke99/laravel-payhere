<?php

namespace Dasundev\PayHere\Concerns;

use Illuminate\Support\Facades\URL;

trait CheckoutForm
{
    public function getForm(): array
    {
        return array_merge(
            $this->customer(),
            $this->items(),
            $this->other()
        );
    }

    private function customer(): array
    {
        return [
            'first_name' => $this->user->payhereFirstName(),
            'last_name' => $this->user->payhereLastName(),
            'email' => $this->user->payhereEmail(),
            'phone' => $this->user->payherePhone(),
            'address' => $this->user->payhereAddress(),
            'city' => $this->user->payhereCity(),
            'country' => $this->user->payhereCountry(),
        ];
    }

    private function items(): array
    {
        $items = [];

        foreach ($this->order->lines as $number => $line) {
            $number += 1;
            $items["item_number_$number"] = $line->purchasable->id;
            $items["item_name_$number"] = $line->purchasable->title;
            $items["quantity_$number"] = $line->unit_quantity;
            $items["amount_$number"] = $line->total;
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
}