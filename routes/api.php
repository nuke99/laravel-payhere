<?php

use Dasundev\PayHere\Http\Controllers\Api\ChargeController;
use Dasundev\PayHere\Http\Controllers\Api\RetrievalController;
use Dasundev\PayHere\Http\Controllers\Api\SubscriptionController;

Route::group(['prefix' => 'payhere/api', 'as' => 'payhere.api.'], function () {
    Route::post('/charge', ChargeController::class)->name('charge');
    Route::get('/retrieval/{order}', RetrievalController::class)->name('retrieval');
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::post('/subscriptions/{subscription}/retry', [SubscriptionController::class, 'retry'])->name('subscriptions.retry');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
});
