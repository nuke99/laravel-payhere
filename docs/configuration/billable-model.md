---
title: Billable Model
weight: 6
---

# Billable Model

You should add the `Billable` trait to your user model definition. this trait provides various methods to perform common billing tasks, such as initiating different types of checkouts and creating subscriptions.

```php
use PayHere\Billable;

class User extends Authenticatable
{
    use Billable;
}
```
