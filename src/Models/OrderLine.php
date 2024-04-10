<?php

namespace Dasundev\PayHere\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class OrderLine extends Model
{
    protected $guarded = [];

    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }
}