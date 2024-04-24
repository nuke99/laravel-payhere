<?php

namespace Dasundev\PayHere\Enums;

/**
 * Payment methods supported by PayHere.
 */
enum PaymentMethod
{
    case VISA;
    case MASTER;
    case AMEX;
    case EZCASH;
    case MCASH;
    case GENIE;
    case VISHWA;
    case PAYAPP;
    case HNB;
    case FRIMI;
}
