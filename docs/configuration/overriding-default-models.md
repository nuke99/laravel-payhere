---
title: Overriding Default Models
weight: 8
---

# Overriding Default Models

First, define your custom model by extending the corresponding Laravel PayHere model:

```php
use PayHere\Models\Subscription as PayHereSubscription

class Subscription extends PayHereSubscription
{
    // ...
}
```

After defining your model, you should inform Laravel PayHere about your custom model in the `boot` method of your application's `App\Providers\AppServiceProvider` class:

```php
use PayHere\PayHere;
use App\Models\PayHere\Subscription;
use App\Models\PayHere\Customer;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    PayHere::useSubscriptionModel(Subscription::class);
    PayHere::useCustomerModel(Customer::class);
}
```
