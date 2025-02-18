@props(['order'])

@php
$id = Str::uuid();
@endphp

<div id="{{ 'onsite-checkout-'.$id }}">
    {{ $slot }}
</div>

<script>
    document.getElementById(@js('onsite-checkout-'.$id)).onclick = function () {
        payhere.startPayment(@js($order));
    };
</script>