<?php

namespace lesson03\example1\demo15;

class Base
{
    public static function first()
    {
        return 'first + ' . self::second();
    }

    public static function second()
    {
        return 'second_1';
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
