<?php

namespace Dasundev\PayHere;

class PayHere
{
    /**
     * The default customer model class name.
     *
     * @var string
     */
    public static string $customerModel = 'App\\Models\\User';

    /**
     * Set the customer model class name.
     * 
     * @param $customerModel
     * @return void
     */
    public static function useCustomerModel($customerModel): void
    {
        static::$customerModel = $customerModel;
    }
}