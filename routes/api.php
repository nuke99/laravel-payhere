<?php

use Dasundev\PayHere\Http\Controllers\Api\ChargeApi;
use Dasundev\PayHere\Http\Controllers\Api\RetrievalApi;

Route::group(['prefix' => 'payhere/api', 'as' => 'payhere.api.'], function () {
    Route::post('/charge', ChargeApi::class)->name('charge');
    Route::post('/retrieval', RetrievalApi::class)->name('retrieval');
});
