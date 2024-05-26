<?php

namespace Dasundev\PayHere\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface PayHereOrder
{
    /**
     * Sets up a one-to-one relationship with a PayHere payment.
     */
    public function payherePayment(): HasOne;
}
