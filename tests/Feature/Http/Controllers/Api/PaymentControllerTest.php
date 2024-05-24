<?php

it('can search payments without an order id', function () {
    $response = $this->getJson('payhere/api/payments/search');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'msg',
            'data',
        ])
        ->assertJsonFragment([
            'status' => 1,
        ]);
});

it('can search payments with an order id', function () {
    $response = $this->getJson('payhere/api/payments/search?order_id=9c1efa4c-61a6-4dbe-9c8f-933e40e1216c');

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'msg',
            'data',
        ])
        ->assertJsonFragment([
            'status' => 1,
            'msg' => 'Payments with order_id:9c1efa4c-61a6-4dbe-9c8f-933e40e1216c',
            'description' => 'Order #9c1efa4c-61a6-4dbe-9c8f-933e40e1216c',
        ]);
});
