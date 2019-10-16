<?php

namespace lesson05\php\demo01\example01\index09;

use ArrayAccess;
use Countable;
use IteratorAggregate;

class PhoneCollection implements IteratorAggregate, ArrayAccess, Countable
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
        return new \ArrayIterator($this->phones);
    }

    ###########################

    public function offsetExists($offset) {
        return array_key_exists($offset, $this->phones);
    }

    public function offsetGet($offset) {
        return $this->phones[$offset];
    }

    public function offsetSet($offset, $value) {
        if ($this->has($value)) {
            throw new \DomainException('Phone already exists.');
        }
        if ($offset) {
            $this->phones[$offset] = $value;
        } else {
            $this->phones[] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->phones[$offset]);
    }

    ###########################

    public function count()
    {
        return count($this->phones);
    }
}

$phones = new PhoneCollection(['88001', '88002', '88003']);

echo $phones[2] . PHP_EOL;

unset($phones[2]);

$phones[4] = '88009';

$phones[] = '89005';
$phones[] = '89006';

foreach ($phones as $phone) {
    echo $phone . PHP_EOL;
}

echo count($phones) . PHP_EOL;

echo serialize($phones) . PHP_EOL;


