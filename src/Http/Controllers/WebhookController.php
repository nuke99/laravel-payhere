<?php

namespace Dasundev\PayHere\Http\Controllers;

use Dasundev\PayHere\Http\Requests\WebhookRequest;
use Dasundev\PayHere\PayHere;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{
    /**
     * Handle incoming webhook notification from PayHere.
     */
    public function handleWebhook(WebhookRequest $request): void
    {
        $payload = $request->all();

        $verified = PayHere::verifyPaymentNotification($payload);

        if ($verified) {
            // TODO: Create the payment $user->payments()->create($payload)

            if ($request->isRecurring()) {
                // TODO: Create the subscription $user->subscriptions()->create($payload)
            }
        }
    }
}
