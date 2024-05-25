<?php

namespace Dasundev\PayHere\Events;

use Dasundev\PayHere\Models\Payment;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        private readonly Payment $payment
    ) {}
}