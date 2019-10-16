<?php

namespace lesson02\example3\demo08;

function createDiscount($limit, $percent)
{
    return function ($cost) use ($limit, $percent)
    {
        if ($cost >= $limit) {
            return $cost * (1 - $percent / 100);
        } else {
            return $cost;
        }
    };
}

$discount1 = createDiscount(1000, 5);
$discount2 = createDiscount(2000, 7);

echo $discount1(1200) . PHP_EOL;
echo $discount2(1200) . PHP_EOL;