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
     * The default order lines relationship name.
     *
     * @var string
     */
    public static string $orderLinesRelationship = 'lines';

    /**
     * The default customer relationship name.
     *
     * @var string
     */
    public static string $customerRelationship = 'user';

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

    /**
     * Set the order lines relationship name.
     *
     * @param string $relationship
     */
    public static function useOrderLinesRelationshipAs(string $relationship): void
    {
        self::$orderLinesRelationship = $relationship;
    }

    /**
     * Set the customer relationship name.
     *
     * @param string $relationship
     */
    public static function useCustomerRelationshipAs(string $relationship): void
    {
        self::$customerRelationship = $relationship;
    }
}