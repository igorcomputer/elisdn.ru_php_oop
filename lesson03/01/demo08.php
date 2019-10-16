<?php

namespace lesson03\example1\demo08;

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

$base = new Base();

echo $base->first() . PHP_EOL;
