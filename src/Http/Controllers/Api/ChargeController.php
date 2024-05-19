<?php

namespace Dasundev\PayHere\Http\Controllers\Api;

use Dasundev\PayHere\Http\Integrations\PayHere\PayHereConnector;
use Dasundev\PayHere\Http\Integrations\PayHere\Requests\PaymentChargeRequest;
use Dasundev\PayHere\Rules\ChargeType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use JsonException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class ChargeController extends Controller
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function __invoke(Request $request)
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
            orderId: $request->order_id
        ));

        return $response->json();
    }
}
