<?php

namespace Dasundev\PayHere\Models\Contracts;

interface PayHereOrderLine
{
    /**
     * Get the unique identifier of the order line.
     *
     * @return string
     */
    public function payHereOrderLineId(): string;

    /**
     * Get the title of the order line.
     *
     * @return string
     */
    public function payHereOrderLineTitle(): string;

    /**
     * Get the quantity of the order line.
     *
     * @return int
     */
    public function payHereOrderLineQty(): int;

    /**
     * Get the total amount for the order line.
     *
     * @return float
     */
    public function payHereOrderLineTotal(): float;
}
