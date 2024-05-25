<?php

namespace Dasundev\PayHere\Concerns;

trait HasTrial
{
    /**
     * Determine if the subscription is within its trial period.
     */
    public function onTrial(): bool
    {
        return $this->trial_ends_at && $this->trial_ends_at->isFuture();
    }
}
