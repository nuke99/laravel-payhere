<?php

use Dasundev\PayHere\Http\Controllers\Api\PaymentController;
use Dasundev\PayHere\Http\Controllers\Api\SubscriptionController;

Route::group(['prefix' => 'payhere/api', 'as' => 'payhere.api.'], function () {
    Route::get('/payment/search/{order?}', [PaymentController::class, 'search'])->name('payment.search');
    Route::post('/payment/charge', [PaymentController::class, 'charge'])->name('payment.charge');
    Route::post('/payment/refund', [PaymentController::class, 'refund'])->name('payment.refund');
    Route::post('/payment/capture', [PaymentController::class, 'capture'])->name('payment.capture');
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::post('/subscriptions/{subscription}/retry', [SubscriptionController::class, 'retry'])->name('subscriptions.retry');
    Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
});
