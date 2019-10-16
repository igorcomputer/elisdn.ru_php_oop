<?php

namespace lesson05\php\demo01\example01\index03;

use Iterator;

class PhoneCollection implements Iterator
{
    private $phones = [];

    public function __construct(array $phones) {
        $this->phones = array_values(array_unique($phones));
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
        $this->phones = array_values(array_diff($this->phones, [$phone]));
    }

    public function has($phone) {
        return in_array($phone, $this->phones);
    }

    public function asArray()
    {
        return $this->phones;
    }

    public function current() { }
    public function next() { }
    public function key() { }
    public function valid() { }
    public function rewind() { }
}

$phones = new PhoneCollection(['88001', '88002', '88003']);

foreach ($phones as $key => $phone) {
    echo $phone . PHP_EOL;
}

$phones->rewind();
while ($phones->valid()) {
    $key = $phones->key();
    $phone = $phones->current();
    echo $phone . PHP_EOL;
    $phones->next();
}
