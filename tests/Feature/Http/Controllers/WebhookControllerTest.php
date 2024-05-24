<?php

use Illuminate\Support\Facades\URL;
use Workbench\App\Models\Order;
use Workbench\App\Models\OrderLine;

it('can handle webhook for normal checkout', function () {
    $order = Order::factory()
        ->has(OrderLine::factory()->count(2), 'lines')
        ->create();

    $uri = URL::signedRoute('payhere.webhook');

    $this->post($uri, [
        'merchant_id' => config('payhere.merchant_id'),
        'order_id' => $order->id,
        'payment_id' => 320032387268,
        'captured_amount' => 1000.00,
        'payhere_amount' => 1000.00,
        'payhere_currency' => 'LKR',
        'status_code' => 2,
        'md5sig' => 'C7A4E240E6927F2F580BFEE05E5BC8B0',
        'status_message' => 'Successfully received the VISA payment',
        'method' => 'VISA',
        'card_holder_name' => 'Dasun Tharanga',
        'card_no' => '************1292',
        'card_expiry' => '09/06',
        'recurring' => 0,
    ]);

    $this->assertDatabaseHas('payments', [
        'order_id' => $order->id,
        'payment_id' => 320032387268,
        'md5sig' => 'C7A4E240E6927F2F580BFEE05E5BC8B0',
    ]);
});

it('can handle webhook for authorize checkout', function () {
    $order = Order::factory()
        ->has(OrderLine::factory()->count(2), 'lines')
        ->create();

    $uri = URL::signedRoute('payhere.webhook');

    $this->post($uri, [
        'merchant_id' => config('payhere.merchant_id'),
        'order_id' => $order->id,
        'authorization_token' => "ad7c02f1-bd40-4ed1-816d-a5bcd8ddaa73",
        'payhere_amount' => 1000.00,
        'payhere_currency' => 'LKR',
        'status_code' => 3,
        'md5sig' => 'BD72AC93E8685273093DE0737C9E668C',
        'status_message' => 'Successfully received the VISA payment',
        'method' => 'VISA',
        'card_holder_name' => 'Dasun Tharanga',
        'card_no' => '************1292',
        'card_expiry' => '09/06',
        'recurring' => 0,
    ]);

    $this->assertDatabaseHas('payments', [
        'order_id' => $order->id,
        'authorization_token' => "ad7c02f1-bd40-4ed1-816d-a5bcd8ddaa73",
        'md5sig' => 'BD72AC93E8685273093DE0737C9E668C',
    ]);
});
