<?php

namespace Dasundev\PayHere\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class CheckoutRequest extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/pay/checkout';
    }
}