<?php

it('it can search payments without an order id', function () {
    $response = $this->getJson('payhere/api/payments/search');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'msg',
            'data'
        ])
        ->assertJsonFragment([
            'status' => 1
        ]);
});

it('it can search payments with an order id', function () {
    $response = $this->getJson('payhere/api/payments/search?order_id=1');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'msg',
            'data'
        ])
        ->assertJsonFragment([
            'status' => 1,
            'msg' => 'Payments with order_id:1',
            'description' => 'Order #1',
        ]);
});
