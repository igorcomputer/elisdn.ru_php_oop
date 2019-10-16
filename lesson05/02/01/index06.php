<?php

namespace lesson05\php\demo01\example01\index06;

use IteratorAggregate;

class PhoneCollection implements IteratorAggregate
{
    private $phones = [];

    public function __construct(array $phones) {
        $this->phones = array_unique($phones);
    }

    public function add($phone) {
        if ($this->has($phone)) {
            throw new \DomainException('Phone already exists.');
        }
        $this->phones[] = $phone;
    }

    public function remove($phone) {
        if (!$this->has($phone)) {
            throw new \DomainException('Phone not found.');
        }
        $this->phones = array_diff($this->phones, [$phone]);
    }

    public function has($phone) {
        return in_array($phone, $this->phones);
    }

    public function getIterator() {
        return new \ArrayIterator(array_values($this->phones));
    }
}

$phones = new PhoneCollection(['88001', '88002', '88003']);

foreach ($phones as $phone) {
    echo $phone . PHP_EOL;
}
