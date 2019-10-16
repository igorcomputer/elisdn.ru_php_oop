<?php

namespace lesson02\example3\demo03;

class StringHelper
{
    public static function toUppercase($string)
    {
        return mb_strtoupper($string, 'utf-8');
    }

    public static function toLowercase($string)
    {
        return mb_strtolower($string, 'utf-8');
    }
}

echo StringHelper::toUppercase('Vasya') . PHP_EOL; // VASYA
echo StringHelper::toLowercase('Vasya') . PHP_EOL; // vasya