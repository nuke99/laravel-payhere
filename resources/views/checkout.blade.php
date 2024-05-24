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

        body {
            background: #ffffff;
        }

        h1 {
            font-size: 24px;
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

        em {
            color: #6b7280;
            font-size: 14px;
        }

        .progress-bar {
            height: 4px;
            background-color: #deecff;
            width: 100%;
            overflow: hidden;
        }

        .progress-bar-value {
            width: 100%;
            height: 100%;
            background-color: #2A41EF;
            animation: indeterminateAnimation 1s infinite linear;
            transform-origin: 0 50%;
        }

        @keyframes indeterminateAnimation {
            0% {
                transform:  translateX(0) scaleX(0);
            }
            40% {
                transform:  translateX(0) scaleX(0.4);
            }
            100% {
                transform:  translateX(100%) scaleX(0.5);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <noscript>Your browser does not support JavaScript!</noscript>
    <div>
        <h1>Redirecting...</h1>
        <p>You will be redirected to the payment gateway in a few seconds.</p>
        <div class="progress-bar">
            <div class="progress-bar-value"></div>
        </div>
        <div style="margin-top: 10px">
            <em>Please do not refresh the page or click the "Back" or "Close" button of your browser.</em>
        </div>
    </div>
    <form id="checkout-form" action="{{ $data['other']['action'] }}" method="post">
        <input type="hidden" name="merchant_id" value="{{ $data['other']['merchant_id'] }}">
        <input type="hidden" name="return_url" value="{{ $data['other']['return_url'] }}">
        <input type="hidden" name="cancel_url" value="{{ $data['other']['cancel_url'] }}">
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
    //document.getElementById('checkout-form').submit()
</script>
</body>
</html>