<?php

use Dasundev\PayHere\Http\Controllers\PayHereController;
use Dasundev\PayHere\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payhere', 'as' => 'payhere.'], function () {
    Route::get('/return', [PayHereController::class, 'return'])->name('return');
    Route::post('/webhook', [WebhookController::class, 'handleWebhook'])->middleware('signed')->name('webhook');
});