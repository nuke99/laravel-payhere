<?php

namespace Dasundev\PayHere\Models;

use Dasundev\PayHere\Enums\PaymentMethod;
use Dasundev\PayHere\Enums\PaymentStatus;
use Dasundev\PayHere\Enums\RecurringStatus;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'method' => PaymentMethod::class,
        'status_code' => PaymentStatus::class,
        'message_type' => RecurringStatus::class
    ];
}
