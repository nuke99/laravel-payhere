<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RetrySubscriptionRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $subscription
    ) {
    }

    public function resolveEndpoint(): string
    {
        return 'merchant/v1/subscription/retry';
    }

    protected function defaultBody(): array
    {
        return [
            'subscription_id' => $this->subscription,
        ];
    }
}
