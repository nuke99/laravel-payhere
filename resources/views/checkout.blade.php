<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Redirecting to PayHere...') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Figtree:300,400,600&display=swap" rel="stylesheet">

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
            font-weight: 500;
        }

        .container {
            max-width: 768px;
            margin: 0 auto;
            padding: 0 1rem;
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
                transform: translateX(0) scaleX(0);
            }
            40% {
                transform: translateX(0) scaleX(0.4);
            }
            100% {
                transform: translateX(100%) scaleX(0.5);
            }
        }

        @media only screen and (max-width: 600px) {
            h1 {
                font-size: 18px;
            }

            p {
                font-size: 14px;
            }

            em {
                font-size: 10px;
            }
        }

        @media (prefers-color-scheme: dark) {
            body {
                background: #111827;
            }

            h1,
            p {
                color: #f3f4f6;
            }

            .progress-bar {
                background-color: #283487;
            }

            .progress-bar-value {
                background-color: #5978fb;
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
        @foreach ($data['other'] as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        @foreach ($data['customer'] as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        @isset($data['recurring'])
            <input type="hidden" name="recurrence" value="{{ $data['recurring']['recurrence'] }}">
            <input type="hidden" name="duration" value="{{ $data['recurring']['duration'] }}">
        @endisset
        @isset($data['platform'])
            <input type="hidden" name="platform" value="{{ $data['platform'] }}">
        @endisset
        @isset($data['startup_fee'])
            <input type="hidden" name="startup_fee" value="{{ $data['startup_fee'] }}">
        @endisset
        @isset($data['custom_1'])
            <input type="hidden" name="custom_1" value="{{ $data['custom_1'] }}">
        @endisset
        @isset($data['custom_2'])
            <input type="hidden" name="custom_2" value="{{ $data['custom_2'] }}">
        @endisset
        @foreach ($data['items'] as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
</div>
<script>
    setTimeout(function () {
        document.getElementById('checkout-form').submit()
    }, 1000)
</script>
</body>
</html>