<?php

namespace Dasundev\PayHere\Models;

use Dasundev\PayHere\Concerns\HasTrial;
use Dasundev\PayHere\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Workbench\App\Models\Order;
use Workbench\App\Models\User;
use Workbench\Database\Factories\SubscriptionFactory;

class Subscription extends Model
{
    use HasFactory;
    use HasTrial;

    protected $guarded = [];

    protected $casts = [
        'status' => SubscriptionStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    protected static function newFactory(): SubscriptionFactory
    {
        return new SubscriptionFactory;
    }
}
