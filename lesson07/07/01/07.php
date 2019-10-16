<?php

namespace other\example07\demo01\step07;

class Status
{
    public function isActive() { }
}

class Phone
{
    public function isMobile() { }
    public function isEqualsTo(self $phone) { }
}

class User
{
    /**
     * @var Status
     * */
    private $status;
    /**
     * @var Phone[]
     * */
    private $phones = [];

    public function addPhone(Phone $phone)
    {
        if (!$this->status->isActive()) {
            throw new \DomainException('User is not active.');
        }

        if (!$phone->isMobile()) {
            throw new \DomainException('Only mobile numbers are alowed.');
        }

        if (array_filter($this->phones, function (Phone $item) use ($phone) { return $item->isEqualsTo($phone); })) {
            throw new \DomainException('Number already exists.');
        }

        $this->phones[] = $phone;

        return count($this->phones);
    }
}
