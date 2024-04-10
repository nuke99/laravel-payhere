<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
        return view('payhere::checkout', [
            'data' => [
                'first_name' => $this->order->user->payhereFirstName()
            ]
        ]);
    }
}