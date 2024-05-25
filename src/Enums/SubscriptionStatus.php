<?php

namespace Dasundev\PayHere\Enums;

enum SubscriptionStatus
{
    case PENDING;
    case TRIALING;
    case ACTIVE;
    case COMPLETED;
    case FAILED;
}
