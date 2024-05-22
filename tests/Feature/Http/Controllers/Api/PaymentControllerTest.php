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
