---
title: Configuration
weight: 2
---

# Configuration

The PayHere panel supports few configurations. you can use them depending on your requirement.

## Authorizing access to the PayHere panel

To access the PayHere panel in non-local environment, add the `PayHerePanelUser` contract to your `App\Models\User` class:

```php
use PayHere\Filament\Contracts\PayHerePanelUser;

class User extends Authenticatable implements PayHerePanelUser
{
    // ...

    public function canAccessPayHerePanel(Panel $panel): bool
    {
        return $this->email === 'admin@yourdomain.com';
    }
}
```

In this example, we check if the user's email matches `admin@yourdomain.com`. If it does, the request will be authorized, allowing access to the PayHere panel.

## Change the default brand logo

To change the default brand logo in the PayHere panel, update the `panel_brand_logo.light` and `panel_brand_logo.dark` path in the `payhere.php` file:

```php
return [

    // ...

    'panel_brand_logo' => [
        'light' => 'vendor/payhere/images/logo-light.svg',                  // [!code --]
        'dark' => 'vendor/payhere/images/logo-dark.svg',                    // [!code --]
        'light' => 'path/to/your/logo-light.svg',                           // [!code ++]
        'dark' => 'path/to/your/logo-dark.svg',                             // [!code ++]
    ],

    // ...

];
```

## Disabling the PayHere panel access

You are free to disable the PayHere panel access by adding the following environment variable:

```dotenv
PAYHERE_PANEL_ACCESS_ENABLED=false
```

## Disabling the PayHere panel login

If your application already uses an authentication method, you might want to disable the PayHere panel's login route by adding the following environment variable:

```dotenv
PAYHERE_PANEL_LOGIN=false
```
