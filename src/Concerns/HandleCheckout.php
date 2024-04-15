<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

trait HandleCheckout
{
    use FormData;

    /**
     * The order associated with this object.
     *
     * @var Order
     */
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
        $baseUrl = config('payhere.base_url');
        
        return view('payhere::checkout', [
            'form' => [
                'action' => "$baseUrl/pay/checkout",
                'data' => $this->getFormData()
            ]
        ]);
    }
}