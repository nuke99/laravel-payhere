<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Models\User;

class CheckoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    public function it_can_render_checkout_page()
    {
        set_time_limit(0);

        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/checkout')
                ->assertAuthenticatedAs($user)
                ->assertTitle('Redirecting to PayHere...');
        });
    }
}
