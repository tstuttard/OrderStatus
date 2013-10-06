<?php namespace Order\Repository

use Order\Model\Order as Order;

class OrderRepository
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }


    public function getOrderWithStatus($id)
    {
        $orderWithStatus = $this->order->find($id)->load('orderStatus');

        return $orderWithStatus;
    }
}