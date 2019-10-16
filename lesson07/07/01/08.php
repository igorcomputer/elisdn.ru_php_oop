<?php

namespace other\example07\demo01\step08;

class Status
{
    public function isActive() { }
}

class Phone
{
    public function isMobile() { }
    public function isEqualsTo(self $phone) { }
}

class Phones
{
    /**
     * @var Phone[]
     */
    private $phones = [];

    public function add(Phone $phone)
    {
        if (!$phone->isMobile()) {
            throw new \DomainException('Only mobile numbers are alowed.');
        }
        if ($this->has($phone)) {
            throw new \DomainException('Number already exists.');
        }
        $this->phones[] = $phone;
    }

    public function count() {
        return count($this->phones);
    }

    public function getAll() {
        return $this->phones;
    }

    private function has(Phone $phone) {
        foreach ($this->phones as $item) {
            if ($item->isEqualsTo($phone)) {
                return true;
            }
        }
        return false;
    }
}

class User
{
    private $status;
    private $phones;

    public function __construct(Status $status, Phones $phones) {
        $this->status = $status;
        $this->phones = $phones;
    }

    public function addPhone(Phone $phone)
    {
        if (!$this->status->isActive()) {
            throw new \DomainException('User is not active.');
        }

        $this->phones->add($phone);

        return $this->phones->count();
    }

    public function getPhones()
    {
        return $this->phones->getAll();
    }
}
