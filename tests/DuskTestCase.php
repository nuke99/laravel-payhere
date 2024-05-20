<?php

namespace Dasundev\PayHere\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Concerns\WithWorkbench;

abstract class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase
{
    use WithWorkbench;
    use RefreshDatabase;
}
