<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Dasundev\PayHere\PayHere;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class PaymentChargeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $orderId
    ) {

    }

    public function resolveEndpoint(): string
    {
        return 'merchant/v1/payment/charge';
    }

    protected function defaultBody(): array
    {
        $order = PayHere::$orderModel::find($this->orderId);

        return [
            'customer_token' => $order->payherePayment->customer_token,
            'items' => "Order #{$order->id}",
            'amount' => $order->total,
            'currency' => config('payhere.currency'),
        ];
    }
}
