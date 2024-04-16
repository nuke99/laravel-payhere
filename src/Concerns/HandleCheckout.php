<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

trait HandleCheckout
{
    use CheckoutForm;

    /**
     * Assign a customer to the checkout process.
     *
     * @var Model
     */
    protected Model $customer;

    /**
     * Set a new order for checkout.
     *
     * @param Model $customer
     * @return HandleCheckout
     */
    public function customer(Model $customer): static
    {
        $this->customer = $customer;

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
            'form' => $this->getForm()
        ]);
    }
}