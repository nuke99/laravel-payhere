<?php

namespace Dasundev\PayHere\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{
    /**
     * Handle incoming webhook notification from PayHere.
     */
    public function handleWebhook(Request $request): void
    {
        //
    }
}
