<?php

namespace lesson03\example1\demo18;

abstract class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    protected function second()
    {
        return 'second';
    }
}

class Sub1 extends Base
{
}

class Sub2 extends Base
{
    protected function second()
    {
        return 'second_2';
    }
}

$base = new Sub1();

echo $base->first() . PHP_EOL;

$base = new Sub2();

echo $base->first() . PHP_EOL;
