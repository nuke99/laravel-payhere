<?php

use Dasundev\PayHere\Http\Controllers\Api\ChargeApi;

Route::group(['prefix' => 'payhere/api', 'as' => 'payhere.api.'], function () {
    Route::post('/charge', ChargeApi::class)->name('charge');
});