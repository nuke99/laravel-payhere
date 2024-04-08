<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PayHere API Base URL
    |--------------------------------------------------------------------------
    |
    | This API Base URL is important for connecting to the PayHere API. By default,
    | it's set to the sandbox URL. Make sure to switch to the live URL when your
    | application goes live.
    |
    | Live URL:    https://www.payhere.lk
    | Sandbox URL: https://sandbox.payhere.lk
    */

    'base_url' => env('PAYHERE_BASE_URL', 'https://sandbox.payhere.lk'),

    /*
    |--------------------------------------------------------------------------
    | PayHere Merchant ID
    |--------------------------------------------------------------------------
    |
    | Your merchant ID is important for identifying your merchant account
    | when connecting to the PayHere API. You can find your merchant ID
    | at https://www.payhere.lk/merchant/domains.
    */

    'merchant_id' => env('PAYHERE_MERCHANT_ID'),
];
