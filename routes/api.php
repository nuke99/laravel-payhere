<?php

use Dasundev\PayHere\Http\Controllers\Api\PaymentController;
use Dasundev\PayHere\Http\Controllers\Api\SubscriptionController;

Route::prefix('payhere/api')->as('payhere.api.')->group(function () {
    Route::prefix('payments')->as('payment.')->group(function () {
        Route::get('search/{order?}', [PaymentController::class, 'search'])->name('search');
        Route::post('charge', [PaymentController::class, 'charge'])->name('charge');
        Route::post('refund', [PaymentController::class, 'refund'])->name('refund');
        Route::post('capture', [PaymentController::class, 'capture'])->name('capture');
    });
    Route::prefix('subscriptions')->as('subscription.')->group(function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('{subscription}', [SubscriptionController::class, 'show'])->name('show');
        Route::post('{subscription}/retry', [SubscriptionController::class, 'retry'])->name('retry');
        Route::delete('{subscription}', [SubscriptionController::class, 'cancel'])->name('cancel');
    });
});
