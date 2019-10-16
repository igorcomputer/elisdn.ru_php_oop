<?php

namespace lesson03\example1\demo16;

class Super
{
    public static function second()
    {
        return 'second_0';
    }
}

class Base extends Super
{
    public static function first()
    {
        return 'first + ' . self::second();
    }
}

class Sub extends Base
{
    public static function second()
    {
        return 'second_2';
    }
}

echo Base::first() . PHP_EOL;

echo Sub::first() . PHP_EOL;
