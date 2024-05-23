<?php

namespace Dasundev\PayHere\Tests\Browser\Concerns;

trait HasPayHereSiteElements
{
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