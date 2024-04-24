<?php

namespace Dasundev\PayHere;

use Dasundev\PayHere\Concerns\GenerateHash;
use Dasundev\PayHere\Concerns\HandleCheckout;
use Dasundev\PayHere\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method morphMany(string $customerModel, string $name)
 */
trait Billable
{
    use GenerateHash;
    use HandleCheckout;

    public function payments(): MorphMany
    {
        return $this->morphMany(PayHere::$customerModel, 'billable');
    }

    public function subscriptions(): MorphMany
    {
        return $this->morphMany(Subscription::class, 'billable');
    }
}
