<?php

namespace Dasundev\PayHere\Http\Controllers;

use Dasundev\PayHere\Http\Requests\WebhookRequest;
use Dasundev\PayHere\Models\Payment;
use Dasundev\PayHere\Models\Subscription;
use Dasundev\PayHere\PayHere;
use Illuminate\Routing\Controller;

class WebhookController extends Controller
{
    /**
     * Handle incoming webhook notification from PayHere.
     */
    public function handleWebhook(WebhookRequest $request)
    {
        $orderId = $request->order_id;

        $verified = PayHere::verifyPaymentNotification(
            orderId: $orderId,
            amount: $request->amount,
            currency: $request->currency,
            statusCode: $request->status_code,
            md5sig: $request->md5sig,
        );

        if (! $verified) {
            return;
        } else {
            $order = PayHere::$orderModel::find($orderId);

            if (! $order) {
                return;
            }

            $relationship = PayHere::$customerRelationship;

            $user = $order->{$relationship};

            Payment::create([
                'billable_id' => $user->id,
                'billable_type' => PayHere::$customerModel,
                $request->all(),
            ]);

            if ($request->isRecurring()) {
                Subscription::create([
                    'billable_id' => $user->id,
                    'billable_type' => PayHere::$customerModel,
                    'ends_at' => $request->item_duration,
                ]);
            }
        }
    }
}
