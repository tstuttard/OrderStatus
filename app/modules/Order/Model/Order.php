<?php namespace Order\Model;

class Order extends \Eloquent
{
    protected $table = 'orders';

    public function orderStatus()
    {
        return $this->belongsTo('Order\Model\OrderStatus', 'order_status_id');
    }

}