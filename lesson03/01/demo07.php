<?php

namespace lesson03\example1\demo07;

class Base
{
    public function first()
    {
        return 'first';
    }
}

class Sub extends Base
{
    public function first()
    {
        return 'extended ' . parent::first();
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