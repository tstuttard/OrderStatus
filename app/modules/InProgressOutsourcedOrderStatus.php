<?php

/**
 * This is the equivelant of a concrete handler
 */
class InProgressOutsourcedOrderStatus extends OrderStatus {

    protected $statusId = 7;

    public function handleOrder(Order $order)
    {
        // Check whethere the order's status matches the Handler's status
        if ($order->order_status_id == $this->statusId) {
            
            echo "InProgressOutsourcedOrderStatus:<br />".
            "Order Status: {$order->order_status_id}</br>".
            "Handler Status: {$this->statusId}";
        } else {
            echo "Order is not on the InProgressOutsourcedOrderStatus Handler";
        }
    }
}