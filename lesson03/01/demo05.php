<?php

namespace lesson03\example1\demo05;

class Base
{
    public function first()
    {
        return 'first';
    }
}

class Sub extends Base
{
    public function second()
    {
        return 'second';
    }
}

class Third extends Sub
{
    public function third()
    {
        return 'third';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$sub = new Sub();

echo $sub->first() . PHP_EOL;
echo $sub->second() . PHP_EOL;

$third = new Third();

echo $third->first() . PHP_EOL;
echo $third->second() . PHP_EOL;
echo $third->third() . PHP_EOL;