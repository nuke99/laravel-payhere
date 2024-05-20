<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Workbench\App\Models\User;

class CheckoutTest extends DuskTestCase {

    public function test_render_checkout_page()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/checkout')
                ->assertUrlIs('/checkout');
        });
    }

}