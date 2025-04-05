---
title: Installation
weight: 3
---

# Installation

## Requirements

Laravel PayHere has a few requirements you should be aware of before installing:

-   Composer
-   PHP 8.2 or higher
-   Laravel v10.0 or higher
-   Filament v3.0 or higher

## Browser support

Laravel PayHere supports modern versions of the following browsers:

-   Apple Safari
-   Google Chrome
-   Microsoft Edge
-   Mozilla Firefox

## Installation via composer

From the root directory of your Laravel app, run the following [Composer](https://getcomposer.org/) command:

```bash
composer require laravel-payhere/laravel-payhere
```

Finally, you may run the following command to publish assets and migrations:

```bash
php artisan payhere:install
```

If you plan to use the PayHere panel, you should run the following command to publish the Filament assets:

```bash
php artisan filament:assets
```
