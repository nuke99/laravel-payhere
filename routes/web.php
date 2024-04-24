<?php

use Dasundev\PayHere\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payhere', 'as' => 'payhere.'], function () {
    Route::view('/success', 'payhere::success')->middleware('signed')->name('success');
    Route::post('/webhook', [WebhookController::class, 'handleWebhook'])->middleware('signed')->name('webhook');
});