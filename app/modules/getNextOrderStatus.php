<?php 
public static function getNextOrderStatus($order)
    {

        $orderStatusObj = new OrderStatus();
        $orderStatuses = $orderStatusObj->getAllForWizard($order['delivery_method_id']);
        unset($orderStatusObj);

        // search current job item
        reset($order['job']['job_items']);
        while ($job_item = current($order['job']['job_items'])) {
            if ($job_item['complete'] == 0) {
                break;
            }
            next($order['job']['job_items']);
        }
        $currentJobItem = current($order['job']['job_items']);
        $nextJobItem = next($order['job']['job_items']);

        // if current job item is outwork (16)
        // if($currentJobItem['object_id'] == 16) {
        //     // remove order status "In Progress" (7)
        //     $itemIdToRemove = 7;
        // } else {
        //     // remove order status "In Progress - Outsourced" (5)
        //     $itemIdToRemove = 5;
        // }

        // remove order status "In Progress - Outsourced" (5)
        $itemIdToRemove = 5;

        // // remove unnecessary order status item
        foreach ($orderStatuses as $key => $orderStatus) {
            if ($orderStatus['id'] == $itemIdToRemove) {
                unset($orderStatuses[$key]);
            }
        }

        // search next order status ID
        reset($orderStatuses);
        while ($status = current($orderStatuses)) {
            if ($order['order_status_id'] == $status['id']) {
                break;
            }
            next($orderStatuses);
        }
        $nextOrderStatus = next($orderStatuses);
        $nextOrderStatus = $nextOrderStatus['id'];

        if ($order['order_status_id'] == 2) {
            $nextOrderStatus = 7;
        } elseif ($nextJobItem == false) {
            $nextOrderStatus = 10;
        }

        // get the next order status
        switch ($order['order_status_id']) {
            // Awaiting Delivery -> Dispatched
            case 15:
                $nextOrderStatus = 25;
                break;
            // Awaiting Collection -> Collected
            case 20:
                $nextOrderStatus = 35;
                break;
            // Dispatched -> Delivered
            case 25:
                $nextOrderStatus = 30;
                break;
            // Delivered -> Delivered
            case 30:
                $nextOrderStatus = 30;
            // Collected -> Collected
            case 35:
                $nextOrderStatus = 35;
            default:
                break;
        }

        return array(
            $orderStatuses,
            $currentJobItem,
            $nextJobItem,
            $nextOrderStatus,
        );
    }