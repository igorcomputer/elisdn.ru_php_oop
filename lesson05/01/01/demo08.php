<?php

namespace lesson05\grasp\example01\demo08;

/** @var Order $order */

if ($order->isCancelable()) {

    echo '<button>Отменить заказ</button>';

}

class Order
{
    const STATUS_NEW = 1;
    const STATUS_PAID = 2;
    const STATUS_SENT = 3;
    const STATUS_CANCEL = 4;

    private $status;
    private $deliveryDate;

    public function isNew()
    {
        return $this->status == self::STATUS_NEW;
    }

    public function isPaid()
    {
        return $this->status == self::STATUS_PAID;
    }

    public function isOnDelivery()
    {
        return $this->deliveryDate < time() + 3600 * 24;
    }

    public function isCancelable()
    {
        return $this->isNew() || ($this->isPaid() && !$this->isOnDelivery());
    }
}