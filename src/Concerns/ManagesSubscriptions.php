<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait ManagesSubscriptions
{
    private ?string $trialEndsAt = null;

    private function createSubscription(): Subscription
    {
        $duration = $this->recurring['duration'];

        $subscription = $this->subscriptions()->create([
            'user_id' => $this->id,
            'order_id' => $this->order->id,
            'ends_at' => now()->add($duration),
            'trial_ends_at' => $this->trialEndsAt
        ]);
        
        $this->customOne($subscription->id);

        return $subscription;
    }

    public function trialDays($trialDays): static
    {
        $this->trialEndsAt = now()->addDays($trialDays);

        return $this;
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}