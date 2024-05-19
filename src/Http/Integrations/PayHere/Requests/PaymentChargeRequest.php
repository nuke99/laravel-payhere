<?php

namespace Dasundev\PayHere\Http\Integrations\PayHere\Requests;

use Dasundev\PayHere\Models\Contracts\PayHereOrder;
use Dasundev\PayHere\PayHere;
use Exception;
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

    /**
     * @throws \Exception
     */
    protected function defaultBody(): array
    {
        $model = PayHere::$orderModel;

        $order = $model::find($this->orderId);

        if (! $order instanceof PayHereOrder) {
            throw new Exception("The '$model' does not implement the 'Dasundev\\PayHere\\Models\\Contracts\\PayHereOrder' interface.");
        }

        return [
            'customer_token' => $order->payherePayment->customer_token,
            'items' => "Order #{$order->id}",
            'amount' => $order->total,
            'currency' => config('payhere.currency'),
        ];
    }
}
