<?php

namespace Dasundev\PayHere\Models;

use Dasundev\PayHere\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Workbench\Database\Factories\SubscriptionFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => SubscriptionStatus::class
    ];

    protected static function newFactory(): SubscriptionFactory
    {
        return new SubscriptionFactory;
    }
}
