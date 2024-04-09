<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Http\Integrations\PayHere\Requests;

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