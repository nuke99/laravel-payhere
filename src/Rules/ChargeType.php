<?php

namespace Dasundev\PayHere\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ChargeType implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! in_array($value, [
            \Dasundev\PayHere\Enums\ChargeType::PAYMENT->name,
            \Dasundev\PayHere\Enums\ChargeType::AUTHORIZE->name,
        ], true)) {
            $fail('The :attribute must be either PAYMENT or AUTHORIZE.');
        }
    }
}
