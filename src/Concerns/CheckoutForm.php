<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\Facades\URL;

trait CheckoutForm
{
    public function getForm(): array
    {
        return array_merge(
            ['customer' => $this->customer()],
            ['items' => $this->items()],
            ['other' => $this->other()]
        );
    }

    private function customer(): array
    {
        return [
            'first_name' => $this->order->user->payhereFirstName(),
            'last_name' => $this->order->user->payhereLastName(),
            'email' => $this->order->user->payhereEmail(),
            'phone' => $this->order->user->payherePhone(),
            'address' => $this->order->user->payhereAddress(),
            'city' => $this->order->user->payhereCity(),
            'country' => $this->order->user->payhereCountry(),
        ];
    }

    private function items(): array
    {
        $relationship = PayHere::$orderLinesRelationship;

        $items = [];

        foreach ($this->order->{$relationship} as $number => $line) {
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