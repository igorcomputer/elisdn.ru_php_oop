<?php

namespace other\example07\demo01\step04;

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

        if ($phone->isMobile()) {
            $notExisted = true;
            foreach ($this->phones as $existedPhone) {
                if ($existedPhone->isEqualsTo($phone)) {
                    $notExisted = false;
                    break;
                }
            }
            if ($notExisted) {
                $this->phones[] = $phone;
                return count($this->phones);
            } else {
                throw new \DomainException('Number already exists.');
            }
        } else {
            throw new \DomainException('Only mobile numbers are alowed.');
        }
    }
}
