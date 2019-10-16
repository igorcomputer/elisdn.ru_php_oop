<?php

namespace lesson03\example1\demo14;

class Base
{
    public function first()
    {
        return 'first + ' . $this->second();
    }

    protected function second()
    {
        return $this->third();
    }

    private function third()
    {
        return 'third_1';
    }
}

class Sub extends Base
{
    protected function second()
    {
        return $this->third();
    }

    private function third()
    {
        return 'third_2';
    }
}

$base = new Base();

echo $base->first() . PHP_EOL;

$base = new Sub();

echo $base->first() . PHP_EOL;
