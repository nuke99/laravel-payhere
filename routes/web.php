<?php

use Dasundev\PayHere\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('payhere/webhook', [WebhookController::class, 'handleWebhook'])
    ->middleware('signed')
    ->name('payhere.webhook');