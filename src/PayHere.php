<?php

namespace Dasundev\PayHere;

use Dasundev\PayHere\Enums\PaymentStatus;
use Illuminate\Support\Facades\Log;

class PayHere
{
    /**
     * The default customer model class name.
     */
    public static string $customerModel = 'App\\Models\\User';

    /**
     * The default order model class name.
     */
    public static string $orderModel = 'App\\Models\\Order';

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
    public static function useCustomerModel($model): void
    {
        static::$customerModel = $model;
    }

    /**
     * Set the order model class name.
     */
    public static function useOrderModel($model): void
    {
        static::$orderModel = $model;
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

    /**
     * Verify the payment notification.
     */
    public static function verifyPaymentNotification(
        string $orderId,
        float $amount,
        string $currency,
        int $statusCode,
        string $md5sig
    ): bool {
        $localMd5Sig = strtoupper(
            md5(
                config('payhere.merchant_id').
                $orderId.
                number_format($amount, 2, '.', '').
                $currency.
                $statusCode.
                strtoupper(md5(config('payhere.merchant_secret')))
            )
        );

        return $localMd5Sig === $md5sig && ($statusCode === PaymentStatus::SUCCESS->value || $statusCode === PaymentStatus::AUTHORIZATION_SUCCESS->value);
    }

    /**
     * Verify if the provided merchant ID matches the configured PayHere merchant ID.
     */
    public static function verifyMerchantId(string $id): bool
    {
        return config('payhere.merchant_id') === $id;
    }
}
