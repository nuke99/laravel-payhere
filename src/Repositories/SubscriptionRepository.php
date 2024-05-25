<?php

namespace Dasundev\PayHere\Repositories;

use Dasundev\PayHere\Enums\SubscriptionStatus;
use Dasundev\PayHere\Models\Subscription;
use Dasundev\PayHere\PayHere;
use Illuminate\Http\Request;

class SubscriptionRepository
{
    /**
     * Activate a subscription for the given user.
     */
    public function activateSubscription($user, Request $request): Subscription
    {
        $subscriptionId = $request->custom_id;

        $subscription = Subscription::find($subscriptionId);

        $subscription->update([
            'billable_id' => $user->id,
            'billable_type' => PayHere::$customerModel,
            'ends_at' => $request->item_duration,
            'status' => SubscriptionStatus::ACTIVE,
        ]);

        $subscription->refresh();

        return $subscription;
    }
}