<?php

namespace Workbench\App\Providers;

use Dasundev\PayHere\PayHere;
use Illuminate\Support\ServiceProvider;
use Workbench\App\Models\Order;
use Workbench\App\Models\User;

class WorkbenchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        PayHere::useCustomerModel(User::class);
        PayHere::useOrderModel(Order::class);
    }
}
