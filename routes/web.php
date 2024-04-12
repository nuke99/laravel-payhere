<?php

use Dasundev\PayHere\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::get('payhere/webhook', [WebhookController::class, 'handleWebhook'])
    ->middleware('signed')
    ->name('payhere.webhook');