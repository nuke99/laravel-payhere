<?php

namespace Dasundev\PayHere\Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;
use Workbench\App\Models\User;

class Checkout extends Page
{
    public function url(): string
    {
        return '/checkout';
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
