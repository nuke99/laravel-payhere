<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class RetrievalRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::GET;

    public function __construct(
        private readonly string $orderId
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/merchant/v1/payment/search';
    }

    protected function defaultQuery(): array
    {
        return [
            'order_id' => $this->orderId,
        ];
    }
}
