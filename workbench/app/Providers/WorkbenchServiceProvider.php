<?php

namespace Workbench\App\Providers;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\ServiceProvider;
use Workbench\App\Models\Order;

class WorkbenchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        PayHere::useOrderModel(Order::class);
    }
}