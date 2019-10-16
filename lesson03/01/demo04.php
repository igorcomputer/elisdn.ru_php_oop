<?php

namespace lesson03\example1\demo04;

class Base
{
    public $name = 'Vasya';

    public function first()
    {
        return 'first';
    }
}

class Sub extends Base
{
    public $date = '2000-01-12';

    public function first()
    {
        return 'first_2';
    }

    public function second()
    {
        return 'second';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$sub = new Sub();

echo $sub->first() . PHP_EOL;
echo $sub->second() . PHP_EOL;