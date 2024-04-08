<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PayHere API Base URL
    |--------------------------------------------------------------------------
    |
    | Here you can set the base URL for the PayHere API. This URL is important
    | for connecting to the PayHere API. By default, it's set to the sandbox URL.
    | Make sure to switch to the live URL when your application goes live.
    |
    | Live URL:    https://www.payhere.lk
    | Sandbox URL: https://sandbox.payhere.lk
    */

    'base_url' => env('PAYHERE_BASE_URL', 'https://sandbox.payhere.lk'),
];
