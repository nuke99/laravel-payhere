<?php

namespace Workbench\App\Models;

use Dasundev\PayHere\Models\Contracts\PayHereOrder;
use Dasundev\PayHere\Models\Payment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Workbench\Database\Factories\OrderFactory;

class Order extends Model implements PayHereOrder
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    public function payherePayment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    protected static function newFactory(): OrderFactory
    {
        return new OrderFactory;
    }
}
