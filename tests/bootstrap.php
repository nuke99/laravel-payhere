<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here, so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Enable Headless Mode
|--------------------------------------------------------------------------
|
| This setting enables headless mode for Testbench Dusk, allowing browser
| tests to run without a graphical user interface.
|
*/
\Orchestra\Testbench\Dusk\Options::withoutUI();
