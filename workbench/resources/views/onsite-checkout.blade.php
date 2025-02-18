<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ __('On-Site Checkout') }}</title>

    @payhereJS
</head>
<body>

<noscript>Your browser does not support JavaScript!</noscript>

<x-payhere::onsite-checkout :$order>
    <button>Buy Now</button>
</x-payhere::onsite-checkout>

</body>
</html>
