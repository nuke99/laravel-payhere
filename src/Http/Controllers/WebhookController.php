<?php

namespace Dasundev\PayHere\Http\Controllers;

use Dasundev\PayHere\Http\Requests\WebhookRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{
    /**
     * Handle incoming webhook notification from PayHere.
     */
    public function handleWebhook(WebhookRequest $request): void
    {
        // TODO: Create the payment

        if ($request->isRecurring()) {
            // TODO: Create the subscription
        }
    }
}
