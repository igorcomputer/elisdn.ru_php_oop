<?php

namespace other\example01\demo03;

abstract class Status
{
    const ORDER_TYPE_INBOUND = 1;
    const ORDER_TYPE_OUTBOUND = 2;
    const ORDER_TYPE_RETURN = 3;

    protected $status;
    protected $type;
    protected $allowed = [];

    public function __construct($status)
    {
        if (!in_array($status, $this->allowed)) {
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
    const ISNEW = 0;
    const LOADED_FROM_API = 1;
    const LOADED_SAVED = 2;
    const COMPLETE = 3;

    protected $allowed = [
        self::ISNEW,
        self::LOADED_FROM_API,
        self::LOADED_SAVED,
        self::COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_INBOUND;
    }
}

class OutboundStatus extends Status
{
    const ISNEW = 10;
    const LOADED = 11;
    const SAVED_AND_CREATE_ORDERS = 12;
    const COMPLETE = 13;

    protected $allowed = [
        self::ISNEW,
        self::LOADED,
        self::SAVED_AND_CREATE_ORDERS,
        self::COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_OUTBOUND;
    }
}

class ReturnStatus extends Status
{
    const ISNEW = 20;
    const LOADED = 21;
    const COMPLETE = 22;

    protected $allowed = [
        self::ISNEW,
        self::LOADED,
        self::COMPLETE,
    ];

    public function __construct($status)
    {
        parent::__construct($status);
        $this->type = self::ORDER_TYPE_RETURN;
    }
}