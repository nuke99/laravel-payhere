<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere;

use Dasundev\PayHere\Exceptions\MissingAppIdException;
use Dasundev\PayHere\Exceptions\MissingAppSecretException;
use Dasundev\PayHere\PayHere;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class PayHereConnector extends Connector
{
    private string $token;

    /**
     * @throws MissingAppIdException
     * @throws MissingAppSecretException
     */
    public function __construct()
    {
        $this->token = PayHere::generateAuthorizeCode();
    }

    public function resolveBaseUrl(): string
    {
        return config('payhere.base_url');
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
