<?php

/**
 * Represents an Order in the databse and is equivelant to our requst
 */
class Order {
    
    public $order_status_id;


    public function setOrderStatus($orderStatusId)
    {
        $this->order_status_id = $orderStatusId;
    }
}