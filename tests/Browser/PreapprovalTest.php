<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\Browser\Pages\Preapproval;
use Dasundev\PayHere\Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Attributes\WithMigration;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Models\User;

class PreapprovalTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    #[WithMigration]
    public function it_can_processes_a_payment_for_preapproval()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->assertAuthenticatedAs($user);

            $browser->visit(new Preapproval)
                ->payAs($user)
                ->assertPaymentApproved();
        });
    }
}
