<?php

namespace lesson02\example3\demo02;

class StringHelper
{
    public static function toUppercase($string)
    {
        return mb_strtoupper($string, 'utf-8');
    }
}

echo StringHelper::toUppercase('Vasya') . PHP_EOL; // VASYA