<?php

namespace Dasundev\PayHere;

class PayHere
{
    /**
     * The default customer model class name.
     */
    public static string $customerModel = 'App\\Models\\User';

    /**
     * The default order lines relationship name.
     */
    public static string $orderLinesRelationship = 'lines';

    /**
     * The default customer relationship name.
     */
    public static string $customerRelationship = 'user';

    /**
     * Set the customer model class name.
     */
    public static function useCustomerModel($customerModel): void
    {
        static::$customerModel = $customerModel;
    }

    /**
     * Set the order lines relationship name.
     */
    public static function useOrderLinesRelationship(string $relationship): void
    {
        self::$orderLinesRelationship = $relationship;
    }

    /**
     * Set the customer relationship name.
     */
    public static function useCustomerRelationship(string $relationship): void
    {
        self::$customerRelationship = $relationship;
    }
}
