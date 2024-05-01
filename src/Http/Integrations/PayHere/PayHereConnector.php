<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere;

use Dasundev\PayHere\Exceptions\MissingAppIdException;
use Dasundev\PayHere\Exceptions\MissingAppSecretException;
use Dasundev\PayHere\PayHere;
use Saloon\Helpers\OAuth2\OAuthConfig;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\OAuth2\ClientCredentialsGrant;

class PayHereConnector extends Connector
{
    use ClientCredentialsGrant;

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

    protected function defaultOauthConfig()
    {
        return OAuthConfig::make()
            ->setClientId(config('payhere.app_id'))
            ->setClientSecret(config('payhere.app_secret'))
            ->setTokenEndpoint('/merchant/v1/oauth/token');
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
