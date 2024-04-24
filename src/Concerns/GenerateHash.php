<?php

namespace Dasundev\PayHere\Concerns;

trait GenerateHash
{
    /**
     * Generate a hash string.
     *
     * The hash value is required starting from 2023-01-16.
     */
    public function generateHash(): string
    {
        return strtoupper(
            md5(
                config('payhere.merchant_id').
                $this->order->id.
                number_format($this->order->total, 2, '.', '').
                config('payhere.currency').
                strtoupper(md5(config('payhere.merchant_secret')))
            )
        );
    }
}
