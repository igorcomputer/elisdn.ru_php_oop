<?php

namespace other\example01\demo01;

abstract class Status
{
    const STATUS_INBOUND_NEW = 0;
    const STATUS_INBOUND_LOADED_FROM_API = 1;
    const STATUS_INBOUND_LOADED_SAVED = 2;
    const STATUS_INBOUND_COMPLETE = 3;

    const STATUS_OUTBOUND_NEW = 10;
    const STATUS_OUTBOUND_LOADED = 11;
    const STATUS_OUTBOUND_SAVED_AND_CREATE_ORDERS = 12;
    const STATUS_OUTBOUND_COMPLETE = 13;

    const STATUS_RETURN_NEW = 20;
    const STATUS_RETURN_LOADED = 21;
    const STATUS_RETURN_COMPLETE = 22;

    const ORDER_TYPE_INBOUND = 1;
    const ORDER_TYPE_OUTBOUND = 2;
    const ORDER_TYPE_RETURN = 3;

    protected $status;
    protected $type;
    protected $allowedStatus = [];

    public function __construct($status)
    {
        if (!in_array($status, $this->allowedStatus)) {
            throw new \InvalidArgumentException('Undefined status ' . $status . '.');
        }
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getType()
    {
        return $this->type;
    }
}

class InboundStatus extends Status
{
    protected $allowedStatus = [
        self::STATUS_INBOUND_NEW,
        self::STATUS_INBOUND_LOADED_FROM_API,
        self::STATUS_INBOUND_LOADED_SAVED,
        self::STATUS_INBOUND_COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_INBOUND;
    }
}

class OutboundStatus extends Status
{
    protected $allowedStatus = [
        self::STATUS_OUTBOUND_NEW,
        self::STATUS_OUTBOUND_LOADED,
        self::STATUS_OUTBOUND_SAVED_AND_CREATE_ORDERS,
        self::STATUS_OUTBOUND_COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_OUTBOUND;
    }
}

class ReturnStatus extends Status
{
    protected $allowedStatus = [
        self::STATUS_RETURN_NEW,
        self::STATUS_RETURN_LOADED,
        self::STATUS_RETURN_COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_RETURN;
    }
}

$status = new InboundStatus(InboundStatus::STATUS_INBOUND_NEW);

$status->getStatus();
$status->getType();