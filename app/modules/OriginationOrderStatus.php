<?php

/**
 * This is the equivelant of a concrete handler
 */
class OriginationOrderStatus extends OrderStatus {

    protected $statusId = 1;

    public function handleOrder(Order $order)
    {
        // Check whethere the order's status matches the Handler's status
        if ($order->order_status_id == $this->statusId ) {
            
            // some formatted view data
            return "OriginationOrderStatus:<br />".
            "Order Status: {$order->order_status_id}</br>".
            "Handler Status: {$this->statusId}";


        } else {
            echo "Order is not on the OriginationOrderStatus<br />";
            $this->nextStatus->handleOrder($order);
        }
    }

    public function returnView()
    {

    }
}