<?php

namespace lesson03\example1\demo11;

class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    protected function second()
    {
        return 'second_1';
    }
}

class Sub extends Base
{
    protected function second()
    {
        return 'second_2';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$base = new Sub();

echo $base->first() . PHP_EOL;
