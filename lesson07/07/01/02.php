<?php

namespace other\example07\demo01\step02;

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
        $error = '';
        $count = 0;

        if ($this->status->isActive()) {
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
                    $count = count($this->phones);
                } else {
                    $error = 'Number already exists.';
                }
            } else {
                $error = 'Only mobile numbers are alowed.';
            }
        } else {
            $error = 'User is not active.';
        }

        if ($error) {
            throw new \DomainException($error);
        } else {
            return $count;
        }
    }
}
