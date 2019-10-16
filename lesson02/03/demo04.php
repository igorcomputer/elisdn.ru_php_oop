<?php

namespace lesson02\example3\demo04;

class Discount
{
    public static function calcCost($cost)
    {
        if ($cost >= 1000) {
            return $cost * 0.95;
        } else {
            return $cost;
        }
    }
}

echo Discount::calcCost(850) . PHP_EOL;
echo Discount::calcCost(1100) . PHP_EOL;