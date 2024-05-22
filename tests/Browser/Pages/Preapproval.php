<?php

namespace Dasundev\PayHere\Tests\Browser\Pages;

use Dasundev\PayHere\Tests\Concerns\HandlesPayment;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class Preapproval extends Page
{
    use HandlesPayment;

    public function url(): string
    {
        return '/preapproval';
    }

    public function assert(Browser $browser): void
    {
        $browser->assertRouteIs('checkout')
            ->assertTitle('Redirecting to PayHere...');
    }

    public static function siteElements(): array
    {
        return [
            '@visa' => 'div#payment_container_VISA',
            '@payment-frame' => 'iframe#pg_iframe',
            '@card-holder-name' => "input[name='cardHolderName']",
            '@card-no' => "input[name='cardNo']",
            '@card-secure-id' => "input[name='cardSecureId']",
            '@card-expiry' => "input[name='cardExpiry']",
            '@pay' => "button[type='submit'].btn-primary",
        ];
    }
}
