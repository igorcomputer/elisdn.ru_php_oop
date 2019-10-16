<?php

namespace other\example01\demo02;

abstract class Status
{
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
    const STATUS_INBOUND_NEW = 0;
    const STATUS_INBOUND_LOADED_FROM_API = 1;
    const STATUS_INBOUND_LOADED_SAVED = 2;
    const STATUS_INBOUND_COMPLETE = 3;

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
    const STATUS_OUTBOUND_NEW = 10;
    const STATUS_OUTBOUND_LOADED = 11;
    const STATUS_OUTBOUND_SAVED_AND_CREATE_ORDERS = 12;
    const STATUS_OUTBOUND_COMPLETE = 13;

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
    const STATUS_RETURN_NEW = 20;
    const STATUS_RETURN_LOADED = 21;
    const STATUS_RETURN_COMPLETE = 22;

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