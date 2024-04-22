<?php

namespace Dasundev\PayHere\Enums;

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