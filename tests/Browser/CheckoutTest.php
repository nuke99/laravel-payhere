<?php

namespace Dasundev\PayHere\Tests\Browser;

use Dasundev\PayHere\Tests\DuskTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Attributes\WithMigration;
use Orchestra\Testbench\Dusk\Options as DuskOptions;
use Orchestra\Testbench\Foundation\Env;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Models\User;

class CheckoutTest extends DuskTestCase
{
    use DatabaseMigrations;

    #[Test]
    #[WithMigration]
    public function it_can_render_checkout_page()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                ->assertAuthenticatedAs($user)
                ->visit('/checkout')
                ->assertTitle('Redirecting to PayHere...');
        });
    }

    protected function driver(): RemoteWebDriver
    {
        return RemoteWebDriver::create(
            Env::get('DUSK_DRIVER_URL') ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                DuskOptions::getChromeOptions()
            ), 50000, 50000
        );
    }
}
