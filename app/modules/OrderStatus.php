<?php

/**
 * This is our handler class
 */
abstract class OrderStatus
{

    /**
     * The Status Id of the order
     */
    protected $statusId;

    /**
     * OrderStatus $nextStatus
     */
    protected $nextStatus;

    /**
     *
     */
    public function setNextStatus(OrderStatus $orderStatus)
    {
        $this->nextStatus = $orderStatus;
    }


    public abstract function handleOrder(Order $order);
}