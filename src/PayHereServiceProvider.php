<?php

namespace Dasundev\PayHere;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PayHereServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('payhere')
            ->hasRoute('web')
            ->hasMigrations([
                'create_orders_table',
                'create_order_lines_table',
            ])
            ->hasViews()
            ->runsMigrations()
            ->hasConfigFile();
    }
}
