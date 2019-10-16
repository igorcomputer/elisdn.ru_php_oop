<?php

namespace lesson05\php\demo01\example01\index05;

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
        return new PhoneIterator(array_values($this->phones));
    }
}

class PhoneIterator implements \Iterator
{
    private $phones = [];
    private $index = 0;

    public function __construct(array $phones) {
        $this->phones = $phones;
    }

    public function current() {
        return $this->phones[$this->index];
    }

    public function next() {
        $this->index++;
    }

    public function key() {
        return $this->index;
    }

    public function valid() {
        return $this->index < count($this->phones);
    }

    public function rewind() {
        $this->index = 0;
    }
}

$phones = new PhoneCollection(['88001', '88002', '88003']);

foreach ($phones as $phone) {
    echo $phone . PHP_EOL;
}
