<?php

namespace Dasundev\PayHere\Enums;

enum SubscriptionStatus
{
    case PENDING;
    case ACTIVE;
    case COMPLETED;
    case FAILED;
}
