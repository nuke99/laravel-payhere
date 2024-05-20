<?php

namespace Dasundev\PayHere\Tests;

use Orchestra\Testbench\Concerns\WithWorkbench;

abstract class DuskTestCase extends \Orchestra\Testbench\Dusk\TestCase
{
    use WithWorkbench;
}
