<?php

namespace Dasundev\PayHere\Http\Controllers\Api;

use Dasundev\PayHere\Http\Integrations\PayHere\PayHereConnector;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\RefundPaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class RefundController extends Controller
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'payment_id' => ['sometimes', 'string'],
            'authorization_token' => ['sometimes', 'string']
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