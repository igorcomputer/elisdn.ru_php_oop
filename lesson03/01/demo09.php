<?php

namespace lesson03\example1\demo09;

class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    private function second()
    {
        return 'second';
    }
}

class Sub extends Base
{
    public function first()
    {
        //return 'first_2 + ' . $this->second();
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$base = new Sub();

echo $base->first() . PHP_EOL;
