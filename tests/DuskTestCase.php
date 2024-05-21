<?php

namespace Dasundev\PayHere\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\Dusk\TestCase;

abstract class DuskTestCase extends TestCase
{
    use WithWorkbench;
    use RefreshDatabase;
}
