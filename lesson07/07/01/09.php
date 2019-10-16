<?php

namespace other\example07\demo01\step10;

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

    public function __construct(array $phones) {
        foreach ($phones as $phone) {
            $this->add($phone);
        }
    }

    public function add(Phone $phone)
    {
        $this->guardPhoneIsMobile($phone);
        $this->guardPhoneIsNew($phone);
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

    private function guardPhoneIsMobile(Phone $phone) {
        if (!$phone->isMobile()) {
            throw new \DomainException('Only mobile numbers are alowed.');
        }
    }

    private function guardPhoneIsNew(Phone $phone) {
        if ($this->has($phone)) {
            throw new \DomainException('Number already exists.');
        }
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

    public function addPhone(Phone $phone) {
        $this->guardIsActive();
        $this->phones->add($phone);
        return $this->phones->count();
    }

    public function getPhones() {
        return $this->phones->getAll();
    }

    public function isActive() {
        return $this->status->isActive();
    }

    private function guardIsActive() {
        if (!$this->isActive()) {
            throw new \DomainException('User is not active.');
        }
    }
}
