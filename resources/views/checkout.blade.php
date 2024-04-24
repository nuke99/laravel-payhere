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
    <form id="checkout-form" action="{{ $data['other']['action'] }}" method="post">
        <input type="hidden" name="merchant_id" value="{{ $data['other']['merchant_id'] }}">
        <input type="hidden" name="return_url" value="{{ $data['other']['return_url'] ?? URL::signedRoute('payhere.return') }}">
        <input type="hidden" name="cancel_url" value="{{ $data['other']['cancel_url'] ?? url('/') }}">
        <input type="hidden" name="notify_url" value="{{ $data['other']['notify_url'] }}">
        <input type="hidden" name="order_id" value="{{ $data['other']['order_id'] }}">
        <input type="hidden" name="items" value="{{ $data['other']['items'] }}">
        <input type="hidden" name="currency" value="{{ $data['other']['currency'] }}">
        <input type="hidden" name="amount" value="{{ $data['other']['amount'] }}">
        <input type="hidden" name="first_name" value="{{ $data['customer']['first_name'] }}">
        <input type="hidden" name="last_name" value="{{ $data['customer']['last_name'] }}">
        <input type="hidden" name="email" value="{{ $data['customer']['email'] }}">
        <input type="hidden" name="phone" value="{{ $data['customer']['phone'] }}">
        <input type="hidden" name="address" value="{{ $data['customer']['address'] }}">
        <input type="hidden" name="city" value="{{ $data['customer']['city'] }}">
        <input type="hidden" name="country" value="{{ $data['customer']['country'] }}">
        <input type="hidden" name="hash" value="{{ $data['other']['hash'] }}">
        @if($data['recurring'])
            <input type="hidden" name="recurrence" value="{{ $data['recurring']['recurrence'] }}">
            <input type="hidden" name="duration" value="{{ $data['recurring']['duration'] }}">
        @endif
        @if($data['platform'])
            <input type="hidden" name="platform" value="{{ $data['platform'] }}">
        @endif
        @if($data['startup_fee'])
            <input type="hidden" name="startup_fee" value="{{ $data['startup_fee'] }}">
        @endif
        @if($data['custom_1'])
            <input type="hidden" name="custom_1" value="{{ $data['custom_1'] }}">
        @endif
        @if($data['custom_2'])
            <input type="hidden" name="custom_2" value="{{ $data['custom_2'] }}">
        @endif
        @foreach($data['items'] as $key => $value)
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