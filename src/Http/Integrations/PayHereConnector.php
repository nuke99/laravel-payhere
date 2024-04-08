<?php

namespace Dasundev\PayHere;

use Saloon\Http\Connector;

class PayHereConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('payhere.base_url');
    }
}