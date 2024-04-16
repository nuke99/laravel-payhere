<?php

namespace Dasundev\PayHere\Exceptions;

use Exception;

class UserNotPayHereCustomerException extends Exception
{
    protected $message = 'The "App\\Models\\User" does not implement the "Dasundev\\PayHere\\Models\\Contracts\\PayHereCustomer" interface.';
}