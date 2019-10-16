<?php

namespace lesson03\example1\demo02;

class Base
{
    public $name = 'Vasya';

    public function first()
    {
        return 'first';
    }
}

class Sub
{
    public $name = 'Vasya';
    public $date = '2000-01-12';

    public function first()
    {
        return 'first';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$sub = new Sub();

echo $sub->first() . PHP_EOL;

 