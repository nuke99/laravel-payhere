<?php

namespace Dasundev\PayHere\Enums;

enum RecurringStatus
{
    case AUTHORIZATION_SUCCESS;
    case AUTHORIZATION_FAILED;
    case RECURRING_INSTALLMENT_SUCCESS;
    case RECURRING_INSTALLMENT_FAILED;
    case RECURRING_COMPLETE;
    case RECURRING_STOPPED;
}
