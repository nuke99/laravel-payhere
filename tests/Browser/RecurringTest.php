<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\Browser\Pages\Preapproval;
use Dasundev\PayHere\Tests\Browser\Pages\Recurring;
use Dasundev\PayHere\Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Attributes\WithMigration;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Models\User;

class RecurringTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    #[WithMigration]
    public function it_can_processes_a_payment_for_recurring()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->assertAuthenticatedAs($user);

            $browser->visit(new Recurring)
                ->payAs($user)
                ->assertPaymentApproved();
        });
    }
}
