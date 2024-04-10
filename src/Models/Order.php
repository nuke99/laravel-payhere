<?php

namespace Dasundev\PayHere\Models;

use Dasundev\PayHere\PayHere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $user
 */
class Order extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(PayHere::$customerModel);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}