<?php

namespace Dasundev\PayHere\Models\Contracts;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface PayHereOrder
{
    public function payherePayment(): HasOne;
}
