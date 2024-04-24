<?php

namespace Dasundev\PayHere\Enums;

enum PaymentStatus: int
{
    case SUCCESS = 2;
    case PENDING = 0;
    case CANCELLED = -1;
    case FAILED = -2;
    case CHARGEBACK = -3;
}
