<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class PaymentChargeRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $customerToken
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/merchant/v1/payment/charge';
    }

    protected function defaultBody(): array
    {
        return [
            'customer_token' => $this->customerToken,
        ];
    }
}
