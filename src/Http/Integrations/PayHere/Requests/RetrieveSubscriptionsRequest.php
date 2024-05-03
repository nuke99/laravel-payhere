<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

class RetrieveSubscriptionsRequest extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return 'merchant/v1/subscription';
    }
}
