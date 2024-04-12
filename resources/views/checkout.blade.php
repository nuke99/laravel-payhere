<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Redirecting to PayHere...') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
<form action="{{ $form['action'] }}" method="post">
    <input type="hidden" name="merchant_id" value="{{ $form['data']['merchant_id'] }}">
    <input type="hidden" name="return_url" value="{{ $form['data']['return_url'] }}">
    <input type="hidden" name="cancel_url" value="{{ $form['data']['cancel_url'] }}">
    <input type="hidden" name="notify_url" value="{{ $form['data']['notify_url'] }}">
    <input type="hidden" name="order_id" value="{{ $form['data']['order_id'] }}">
    <input type="hidden" name="items" value="{{ $form['data']['items'] }}">
    <input type="hidden" name="currency" value="{{ $form['data']['currency'] }}">
    <input type="hidden" name="amount" value="{{ $form['data']['amount'] }}">
    <input type="hidden" name="first_name" value="{{ $form['data']['first_name'] }}">
    <input type="hidden" name="last_name" value="{{ $form['data']['last_name'] }}">
    <input type="hidden" name="email" value="{{ $form['data']['email'] }}">
    <input type="hidden" name="phone" value="{{ $form['data']['phone'] }}">
    <input type="hidden" name="address" value="{{ $form['data']['address'] }}">
    <input type="hidden" name="city" value="{{ $form['data']['city'] }}">
    <input type="hidden" name="country" value="{{ $form['data']['country'] }}">
    <input type="hidden" name="hash" value="{{ $form['data']['hash'] }}">
    <input type="submit" value="Checkout">
</form>
</body>
</html>