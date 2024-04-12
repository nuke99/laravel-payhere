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

    /*
    |--------------------------------------------------------------------------
    | PayHere Merchant Secret
    |--------------------------------------------------------------------------
    |
    | Your merchant secret is important for accessing your merchant account
    | when connecting to the PayHere API. You can generate a Merchant Secret
    | by following the steps below:
    |
    | 1. Navigate to the Side Menu > Integrations section of your PayHere Account.
    | 2. Click 'Add Domain/App' > Enter your top-level domain or App package name > Click 'Request to Allow'.
    | 3. Wait for the approval for your domain/app (This may take up to 24 hours).
    | 4. Copy the Merchant Secret displayed next to your domain/app.
    */

    'merchant_secret' => env('PAYHERE_MERCHANT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | PayHere Currency
    |--------------------------------------------------------------------------
    |
    | Customize currency settings according to your preferences.
    | Supports payments in LKR, USD, EUR, GBP, and AUD currencies.
    */

    'currency' => env('PAYHERE_CURRENCY', 'LKR'),

    /*
    |--------------------------------------------------------------------------
    | PayHere Return URL
    |--------------------------------------------------------------------------
    |
    | The URL to redirect users to after payment approval.
    */

    'return_url' => env('PAYHERE_RETURN_URL'),
];
