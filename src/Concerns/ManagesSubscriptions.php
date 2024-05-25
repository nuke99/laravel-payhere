<?php

namespace Dasundev\PayHere\Concerns;

use Dasundev\PayHere\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ManagesSubscriptions
{
    /**
     * The date when the trial period ends.
     */
    private ?string $trialEndsAt = null;

    /**
     * Set the trial period in days.
     */
    public function trialDays($trialDays): static
    {
        $this->trialEndsAt = now()->addDays($trialDays);

        return $this;
    }

    /**
     * Sets up a one-to-many relationship with the Subscription model.
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
