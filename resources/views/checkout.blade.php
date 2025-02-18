<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>{{ __('Redirecting to PayHere') }}</title>
</head>
<body>
    <noscript>Your browser does not support JavaScript!</noscript>
    
    <p>Redirecting to PayHere...</p>
    
    <form id="checkoutForm" action="{{ $order['action_url'] }}" method="post">
        @foreach($order as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    </form>
    <script>
        setTimeout(function () {
            document.getElementById('checkoutForm').submit();
        });
    </script>
</body>
</html>
