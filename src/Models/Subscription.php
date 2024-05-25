<?php

namespace Dasundev\PayHere\Models;

use Dasundev\PayHere\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Workbench\Database\Factories\SubscriptionFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => SubscriptionStatus::class,
    ];

    /**
     * Determine if the subscription is within its trial period.
     */
    public function onTrial(): bool
    {
        return $this->trial_ends_at && $this->trial_ends_at->isFuture();
    }

    protected static function newFactory(): SubscriptionFactory
    {
        return new SubscriptionFactory;
    }
}
