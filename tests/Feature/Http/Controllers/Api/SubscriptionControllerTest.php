<?php

use Dasundev\PayHere\Models\Payment;

it('can fetch all subscriptions', function () {
    $response = $this->getJson('payhere/api/subscriptions');

    $response
        ->assertStatus(200)
        ->assertJsonStructure(['status', 'msg', 'data'])
        ->assertJsonFragment(['status' => 1]);
});