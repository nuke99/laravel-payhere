<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Redirecting to PayHere...') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        html {
            font-family: 'Figtree', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        html:hover {
            cursor: progress;
        }

        body {
            background: #e5e7eb;
        }

        .container {
            background: #ffffff;
            max-width: 768px;
            margin: 0 auto;
            padding: 1rem 3rem;
            border-radius: 1rem;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <noscript>Your browser does not support JavaScript!</noscript>
    <div>
        <h1>Redirecting...</h1>
        <p>You will be redirected to the PayHere gateway within <strong><span id="seconds"></span> seconds.</strong></p>
        <p>Please do not refresh the page or click the "Back" or "Close" button of your browser.</p>
    </div>
    <form id="checkout-form" action="{{ $form['other']['action'] }}" method="post">
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
        @if($form['recurring'])
            <input type="hidden" name="recurrence" value="{{ $form['recurring']['recurrence'] }}">
            <input type="hidden" name="duration" value="{{ $form['recurring']['duration'] }}">
        @endif
        @if($form['platform'])
            <input type="hidden" name="platform" value="{{ $form['platform'] }}">
        @endif
        @if($form['startup_fee'])
            <input type="hidden" name="startup_fee" value="{{ $form['startup_fee'] }}">
        @endif
        @if($form['custom_1'])
            <input type="hidden" name="custom_1" value="{{ $form['custom_1'] }}">
        @endif
        @if($form['custom_2'])
            <input type="hidden" name="custom_2" value="{{ $form['custom_2'] }}">
        @endif
        @foreach($form['items'] as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
</div>
<script type="application/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        countdown(3, document.getElementById('seconds'));
    });

    async function countdown(seconds, el) {
        const delay = 1000;

        while (seconds > 0) {
            el.innerHTML = seconds;

            await new Promise(resolve => setTimeout(resolve, delay));

            seconds--;
        }

        submit();
    }

    function submit() {
        document.getElementById('checkout-form').submit()
    }
</script>
</body>
</html>