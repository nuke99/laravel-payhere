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
<form action="{{ $form['other']['action'] }}" method="post">
    <input type="hidden" name="merchant_id" value="{{ $form['other']['merchant_id'] }}">
    <input type="hidden" name="return_url" value="{{ $form['other']['return_url'] }}">
    <input type="hidden" name="cancel_url" value="{{ $form['other']['cancel_url'] }}">
    <input type="hidden" name="notify_url" value="{{ $form['other']['notify_url'] }}">
    <input type="hidden" name="order_id" value="{{ $form['other']['order_id'] }}">
    <input type="hidden" name="items" value="{{ $form['other']['items'] }}">
    <input type="hidden" name="currency" value="{{ $form['other']['currency'] }}">
    <input type="hidden" name="amount" value="{{ $form['other']['amount'] }}">
    <input type="hidden" name="first_name" value="{{ $form['customer']['first_name'] }}">
    <input type="hidden" name="last_name" value="{{ $form['customer']['last_name'] }}">
    <input type="hidden" name="email" value="{{ $form['customer']['email'] }}">
    <input type="hidden" name="phone" value="{{ $form['customer']['phone'] }}">
    <input type="hidden" name="address" value="{{ $form['customer']['address'] }}">
    <input type="hidden" name="city" value="{{ $form['customer']['city'] }}">
    <input type="hidden" name="country" value="{{ $form['customer']['country'] }}">
    <input type="hidden" name="hash" value="{{ $form['other']['hash'] }}">
    @foreach($form['items'] as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
    <input type="submit" value="Checkout">
</form>
</body>
</html>