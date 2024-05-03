<?php

use Dasundev\PayHere\Http\Controllers\Api\ChargeController;
use Dasundev\PayHere\Http\Controllers\Api\RetrievalController;

Route::group(['prefix' => 'payhere/api', 'as' => 'payhere.api.'], function () {
    Route::post('/charge', ChargeController::class)->name('charge');
    Route::post('/retrieval', RetrievalController::class)->name('retrieval');
});
