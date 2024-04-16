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
    <input type="hidden" name="merchant_id" value="{{ $form['merchant_id'] }}">
    <input type="hidden" name="return_url" value="{{ $form['return_url'] }}">
    <input type="hidden" name="cancel_url" value="{{ $form['cancel_url'] }}">
    <input type="hidden" name="notify_url" value="{{ $form['notify_url'] }}">
    <input type="hidden" name="order_id" value="{{ $form['order_id'] }}">
    <input type="hidden" name="items" value="{{ $form['items'] }}">
    <input type="hidden" name="currency" value="{{ $form['currency'] }}">
    <input type="hidden" name="amount" value="{{ $form['amount'] }}">
    <input type="hidden" name="first_name" value="{{ $form['first_name'] }}">
    <input type="hidden" name="last_name" value="{{ $form['last_name'] }}">
    <input type="hidden" name="email" value="{{ $form['email'] }}">
    <input type="hidden" name="phone" value="{{ $form['phone'] }}">
    <input type="hidden" name="address" value="{{ $form['address'] }}">
    <input type="hidden" name="city" value="{{ $form['city'] }}">
    <input type="hidden" name="country" value="{{ $form['country'] }}">
    <input type="hidden" name="hash" value="{{ $form['hash'] }}">
    <input type="submit" value="Checkout">
</form>
</body>
</html>