<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\PayHere;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ManagesPayments
{
    public function payments(): MorphMany
    {
        return $this->morphMany(PayHere::$customerModel, 'billable');
    }
}
