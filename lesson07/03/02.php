<?php
namespace other\example02\demo02;

class Example
{
    private $first = 'default';
    private $last = 'default';

    public static function create($first, $last)
    {
        $example = new Example();
        $example->first = $first;
        $example->last = $last;
        return $example;
    }

    public function getFullName()
    {
        return $this->first . ' ' . $this->last;
    }
}

$first = new Example();
echo $first->getFullName() . PHP_EOL;

$second = Example::create('first', 'last');
echo $second->getFullName() . PHP_EOL;
