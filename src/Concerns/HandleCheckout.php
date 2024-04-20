<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;

trait HandleCheckout
{
    use CheckoutFormData;

    /**
     * The order associated with this object.
     *
     * @var Model
     */
    protected Model $order;

    /**
     * Set a new order for checkout.
     *
     * @param Model $order
     * @return HandleCheckout
     */
    public function newOrder(Model $order): static
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
            'form' => $this->getFormData()
        ]);
    }
}