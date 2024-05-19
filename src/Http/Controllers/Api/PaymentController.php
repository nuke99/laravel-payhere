<?php

namespace Dasundev\PayHere\Http\Controllers\Api;

use Dasundev\PayHere\Http\Integrations\PayHere\PayHereConnector;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\CapturePaymentRequest;
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
}