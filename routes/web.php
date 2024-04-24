<?php

use Dasundev\PayHere\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payhere', 'as' => 'payhere.'], function () {
    // Skipped using the "signed" middleware
    // because the controller needs to manually ignore the "order_id" parameter
    // that comes with the Payhere return URL.
    Route::view('/return', 'payhere::return')->name('return');
    Route::post('/webhook', [WebhookController::class, 'handleWebhook'])->middleware('signed')->name('webhook');
});