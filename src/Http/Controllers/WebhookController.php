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
        }

        if (! $order = PayHere::$orderModel::find($orderId)) {
            return;
        }

        $relationship = PayHere::$customerRelationship;

        $user = $order->{$relationship};

        Payment::create([
            'billable_id' => $user->id,
            'billable_type' => PayHere::$customerModel,
            'order_id' => $request->order_id,
            'payment_id' => $request->payment_id,
            'subscription_id' => $request->subscription_id,
            'payhere_amount' => $request->payhere_amount,
            'payhere_currency' => $request->payhere_currency,
            'status_code' => $request->status_code,
            'md5sig' => $request->md5sig,
            'method' => $request->input('method'),
            'card_holder_name' => $request->card_holder_name,
            'card_no' => $request->card_no,
            'card_expiry' => $request->card_expiry,
            'message_type' => $request->message_type,
            'item_recurrence' => $request->item_recurrence,
            'item_duration' => $request->item_duration,
            'item_rec_status' => $request->item_rec_status,
            'item_rec_date_next' => $request->item_rec_date_next,
            'item_rec_install_paid' => $request->item_rec_install_paid,
            'customer_token' => $request->customer_token,
            'custom_1' => $request->custom_1,
            'custom_2' => $request->custom_2,
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
