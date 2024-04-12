<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

trait HandleCheckout
{
    protected Order $order;

    /**
     * Set a new order for checkout.
     *
     * @param Order $order
     * @return HandleCheckout
     */
    public function newOrder(Order $order): static
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Initiate the checkout process.
     *
     * @return View
     */
    public function checkout(): View
    {
        $parameters = [
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
            'items' => $this->order->id,
            'currency' => config('payhere.currency'),
            'amount' => $this->order->total,
            'hash' => $this->generateHash(),
        ];

        foreach ($this->order->lines as $index => $line) {
            $items["item_number_$index"] = $line->purchasable->id;
            $items["item_name_$index"] = $line->purchasable->title;
            $items["quantity_$index"] = $line->unit_quantity;
            $items["amount_$index"] = $line->total;
        }

        return view('payhere::checkout', [
            'parameters' => array_merge($parameters, $items ?? [])
        ]);
    }
}