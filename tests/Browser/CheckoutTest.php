<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\Browser\Pages\Checkout;
use Dasundev\PayHere\Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Attributes\WithMigration;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Models\User;

class CheckoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    #[WithMigration]
    public function it_processes_a_payment_successfully()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->assertAuthenticatedAs($user);

            $browser->visit(new Checkout)
                ->assertTitle('Redirecting to PayHere...');

            $browser->waitForText('Pay with', 10);

            $browser->pause(1000);

            $browser->click('@visa')
                ->assertSee('Bank Card');

            $browser->pause(1000);

            $browser->withinFrame('@payment-frame', function (Browser $iframe) use ($user) {
                $iframe->type('@card-holder-name', $user->name)
                    ->assertInputValue('@card-holder-name', $user->name);

                $iframe
                    ->type('@card-no', '4916217501611292')
                    ->assertInputValue('@card-no', '4916217501611292');

                $iframe->type('@card-secure-id', '123')
                    ->assertInputValue('@card-secure-id', '123');

                $iframe->type('@card-expiry', now()->addYear()->format('m/y'))
                    ->assertInputValue('@card-expiry', now()->addYear()->format('m/y'));

                $iframe->pause(1000);

                $iframe->press('@pay');
            });

            $browser->waitForText('Payment Approved', 10);
        });
    }
}
