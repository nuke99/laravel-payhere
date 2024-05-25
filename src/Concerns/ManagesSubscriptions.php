<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ManagesSubscriptions
{
    private ?string $trialEndsAt = null;

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
