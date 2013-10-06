<?php

function __autoload($className)
{
    include $className.'.php';
}

class Client {

    public function __construct(Order $order)
    {
        $origination = new OriginationOrderStatus();
        $repro = new ReproOrderStatus();
        $inProgressOutsourced = new InProgressOutsourcedOrderStatus();
        $inProgress = new InProgressOrderStatus();
        $readyToPack = new ReadyToPackOrderStatus();
        $awaitingDelivery = new AwaitingDeliveryOrderStatus();
        $awaitingCollection = new AwaitingCollectionOrderStatus();
        $dispatched = new DispatchedOrderStatus();
        $delivered = new DeliveredOrderStatus();
        $collected = new CollectedOrderStatus();

        $origination->setNextStatus($repro);
        $repro->setNextStatus($inProgressOutsourced);
        $inProgressOutsourced->setNextStatus($inProgress);

        $origination->handleOrder($order);

        // Send requests to the chain
        

    }

}

$order = new Order();
$order->setOrderStatus(1);

$client = new Client($order);

