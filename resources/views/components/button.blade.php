@props(['order'])

@php
$id = $order['order_id'];
@endphp

<button id="{{ $id }}" {{ $attributes }}>
    {{ $slot }}
</button>

<script>
    document.getElementById(@js($id)).onclick = function () {
        payhere.startPayment(@js($order));
    };
</script>