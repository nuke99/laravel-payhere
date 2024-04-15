<?php

namespace Dasundev\PayHere\Concerns;

use Illuminate\Support\Facades\URL;

trait FormData
{
    public function getFormData(): array
    {
        return array_merge($this->requiredData(), $this->items());
    }

    private function requiredData(): array
    {
        return [
            'merchant_id' => config('payhere.merchant_id'),
            'return_url' => config('payhere.return_url'),
            'cancel_url' => config('payhere.cancel_url'),
            'notify_url' => URL::signedRoute('payhere.webhook'),
            'first_name' => $this->order->user->payhereFirstName(),
            'last_name' => $this->order->user->payhereLastName(),
            'email' => $this->order->user->payhereEmail(),
            'phone' => $this->order->user->payherePhone(),
            'address' => $this->order->user->payhereAddress(),
            'city' => $this->order->user->payhereCity(),
            'country' => $this->order->user->payhereCountry(),
            'order_id' => $this->order->id,
            'items' => "Order #{$this->order->id}",
            'currency' => config('payhere.currency'),
            'amount' => $this->order->total,
            'hash' => $this->generateHash(),
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
}