<?php

use Workbench\App\Models\User;

it('it can render checkout page', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/checkout');

    $response
        ->assertStatus(200)
        ->assertSeeText('Redirecting...');
});
