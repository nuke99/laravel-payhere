<?php

namespace Dasundev\PayHere\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface PayHereSubscription
{
    /**
     * Sets up a one-to-one relationship with a PayHere subscription.
     */
    public function payhereSubscription(): HasOne;
}
