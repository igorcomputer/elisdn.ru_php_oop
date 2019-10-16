<?php

namespace lesson03\example1\demo20;

final class Base
{
    public function first()
    {
        return 'first';
    }
}

class Sub1
{
    final public function second()
    {
        return 'second';
    }
}

class Sub2 extends Sub1
{
    protected function third()
    {
        return 'third';
    }
}

$base = new Sub1();

echo $base->first() . PHP_EOL;

$base = new Sub2();

echo $base->first() . PHP_EOL;
