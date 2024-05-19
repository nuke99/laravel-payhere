<?php

it('it can search payments without order id', function () {
   $response = $this->getJson('payhere/api/payments/search');

   $response
       ->assertStatus(200)
       ->assertJsonStructure([
           'status',
           'msg',
           'data'
       ])
       ->assertJsonFragment([
           'email' => 'hello@dasun.dev'
       ]);
});