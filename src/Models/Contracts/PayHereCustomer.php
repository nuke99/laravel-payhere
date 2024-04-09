<?php

namespace Dasundev\PayHere\Models\Contracts;

interface PayHereCustomer
{
    /**
     * Get the first name of the customer.
     *
     * @return string
     */
    public function payHereFirstName(): string;

    /**
     * Get the last name of the customer.
     *
     * @return string
     */
    public function payHereLastName(): string;

    /**
     * Get the email address of the customer.
     *
     * @return string
     */
    public function payHereEmail(): string;

    /**
     * Get the phone number of the customer.
     *
     * @return string
     */
    public function payHerePhone(): string;

    /**
     * Get the address of the customer.
     *
     * @return string
     */
    public function payHereAddress(): string;

    /**
     * Get the city of the customer.
     *
     * @return string
     */
    public function payHereCity(): string;

    /**
     * Get the country of the customer.
     *
     * @return string
     */
    public function payHereCountry(): string;
}