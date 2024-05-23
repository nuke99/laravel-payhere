<?php

namespace Dasundev\PayHere\Tests\Browser\Pages;

use Dasundev\PayHere\Tests\Browser\Concerns\HandlesPayment;
use Dasundev\PayHere\Tests\Browser\Concerns\HasPayHereSiteElements;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class Checkout extends Page
{
    use HandlesPayment;
    use HasPayHereSiteElements;

    public function url(): string
    {
        return '/preapproval';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertRouteIs('preapproval')
            ->assertTitle('Redirecting to PayHere...');
    }
}
