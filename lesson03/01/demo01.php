<?php

namespace lesson03\example1\demo01;

class Base
{
    public $name = 'Vasya';

    public function first()
    {
        return 'first';
    }
}

$base = new Base();

echo $base->name . PHP_EOL;
echo $base->first() . PHP_EOL;
