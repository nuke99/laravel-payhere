<?php

namespace Dasundev\PayHere\Http\Controllers\Api;

use Dasundev\PayHere\Http\Integrations\PayHere\PayHereConnector;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\CapturePaymentRequest;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\ListPaymentsRequest;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\PaymentChargeRequest;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\RefundPaymentRequest;
use Dasundev\PayHere\Rules\ChargeType;
use Illuminate\Http\Request;
use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class PaymentController
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function search(Request $request)
    {
        $orderId = $request->input('order_id');

        $connector = new PayHereConnector;

        $authenticator = $connector->getAccessToken();

        $connector->authenticate($authenticator);

        $response = $connector->send(new ListPaymentsRequest($orderId));

        return $response->json();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function charge(Request $request)
    {
        $request->validate([
            'type' => ['sometimes', 'string', new ChargeType],
            'order_id' => ['required', 'string'],
            'custom_1' => ['sometimes', 'string'],
            'custom_2' => ['sometimes', 'string'],
        ]);

        $connector = new PayHereConnector;

        $authenticator = $connector->getAccessToken();

        $connector->authenticate($authenticator);

        $response = $connector->send(new PaymentChargeRequest(
            orderId: $request->order_id,
            type: $request->type,
            customOne: $request->custom_1,
            customTwo: $request->custom_2
        ));

        return $response->json();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function capture(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'authorization_token' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
        ]);

        $connector = new PayHereConnector;

        $authenticator = $connector->getAccessToken();

        $connector->authenticate($authenticator);

        $response = $connector->send(new CapturePaymentRequest(
            description: $request->description,
            authorizationToken: $request->authorization_token,
            amount: $request->amount
        ));

        return $response->json();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function refund(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'payment_id' => ['sometimes', 'string'],
            'authorization_token' => ['sometimes', 'string'],
        ]);

        $connector = new PayHereConnector;

        $authenticator = $connector->getAccessToken();

        $connector->authenticate($authenticator);

        $response = $connector->send(new RefundPaymentRequest(
            description: $request->description,
            paymentId: $request->payment_id,
            authorizationToken: $request->authorization_token
        ));

        return $response->json();
    }
}
