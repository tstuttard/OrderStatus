<?php

/**
 * This is the equivelant of a concrete handler
 */
class AwaitingCollectionOrderStatus extends OrderStatus {

    protected $statusId = 20;

    public function handleOrder(Order $order)
    {
        // Check whethere the order's status matches the Handler's status
        if ($order->order_status_id == $this->statusId) {
            
            echo "AwaitingCollectionOrderStatus:<br />".
            "Order Status: {$order->order_status_id}</br>".
            "Handler Status: {$this->statusId}";
        } else {
            echo "Order is not on the AwaitingCollectionOrderStatus Handler";
        }
    }
}