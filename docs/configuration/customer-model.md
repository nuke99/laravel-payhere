---
title: Customer Model
weight: 5
---

# Customer Model

To accept payments from authenticated users in your Laravel application, you must implement the `PayHere\Models\Contracts\PayHereCustomer` interface in your user model definition.

```php
use PayHere\Models\Contracts\PayHereCustomer;

class User extends Model implements PayHereCustomer
{
    // ...

    public function payHereFirstName(): ?string
    {
         return $this->first_name;
    }

    public function payHereLastName(): ?string
    {
        return $this->last_name;
    }

    public function payHereEmail(): ?string
    {
        return $this->email;
    }

    public function payHerePhone(): ?string
    {
        return $this->phone;
    }

    public function payHereAddress(): ?string
    {
        return $this->address;
    }

    public function payHereCity(): ?string
    {
        return $this->city;
    }

    public function payHereCountry(): ?string
    {
        return $this->country;
    }
}
```
