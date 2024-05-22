<?php

namespace Dasundev\PayHere\Tests\Concerns;

use Laravel\Dusk\Browser;
use Workbench\App\Models\User;

trait HandlesPayment
{
    public function pay(Browser $browser, User $user): void
    {
        $browser->waitForText('Pay with', 10);

        $browser->pause(1000);

        $browser->click('@visa')
            ->assertSee('Bank Card');

        $browser->pause(1000);

        $browser->withinFrame('@payment-frame', function (Browser $iframe) use ($user) {
            $iframe->type('@card-holder-name', $user->name)
                ->assertInputValue('@card-holder-name', $user->name);

            $iframe->type('@card-no', '4916217501611292')
                ->assertInputValue('@card-no', '4916217501611292');

            $iframe->type('@card-secure-id', '123')
                ->assertInputValue('@card-secure-id', '123');

            $iframe->type('@card-expiry', now()->addYear()->format('m/y'))
                ->assertInputValue('@card-expiry', now()->addYear()->format('m/y'));

            $iframe->pause(1000);

            $iframe->press('@pay');
        });
    }
}