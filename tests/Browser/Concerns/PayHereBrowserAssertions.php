<?php

namespace Dasundev\PayHere\Tests\Browser\Concerns;

use Laravel\Dusk\Browser;

trait PayHereBrowserAssertions
{
    public function assertPaymentApproved(Browser $browser): void
    {
        $browser->waitForRoute('payhere.return')
            ->assertSee('Payment approved')
            ->assertQueryStringHas('order_id');
    }
}