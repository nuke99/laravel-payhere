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
        private $order
    ) {
        $this->order = PayHere::$orderModel::find($order);
    }

    public function resolveEndpoint(): string
    {
        return 'merchant/v1/payment/charge';
    }

    protected function defaultBody(): array
    {
        return [
            'customer_token' => $this->order->payherePayment->customer_token,
            'items' => "Order #{$this->order->id}",
            'amount' => $this->order->total,
            'currency' => config('payhere.currency')
        ];
    }
}
