<?php

namespace other\example01\demo05;

abstract class Status
{
    protected $status;

    public function __construct($status)
    {
        if (!in_array($status, $this->getAllowed())) {
            throw new \InvalidArgumentException('Undefined status ' . $status . '.');
        }
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function getAllowed()
    {
        return (new \ReflectionClass(get_class($this)))->getConstants();
    }
}

class InboundStatus extends Status
{
    const ISNEW = 0;
    const LOADED_FROM_API = 1;
    const LOADED_SAVED = 2;
    const COMPLETE = 3;
}

class OutboundStatus extends Status
{
    const ISNEW = 10;
    const LOADED = 11;
    const SAVED_AND_CREATE_ORDERS = 12;
    const COMPLETE = 13;
}

class ReturnStatus extends Status
{
    const ISNEW = 20;
    const LOADED = 21;
    const COMPLETE = 22;
}