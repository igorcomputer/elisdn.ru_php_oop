<?php

namespace lesson02\example3\demo01;

function toUppercase($string)
{
    return mb_strtoupper($string, 'utf-8');
}

echo toUppercase('Vasya') . PHP_EOL; // VASYA