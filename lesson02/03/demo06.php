<?php

namespace lesson02\example3\demo06;

class Discount
{
    public $limit;
    public $percent;

    public function calcCost($cost)
    {
        if ($cost >= $this->limit) {
            return $cost * (1 - $this->percent / 100);
        } else {
            return $cost;
        }
    }
}

$discount1 = new Discount();
$discount1->limit = 1000;
$discount1->percent = 5;

$discount2 = new Discount();
$discount2->limit = 2000;
$discount2->percent = 7;

echo $discount1->calcCost(1200) . PHP_EOL;
echo $discount2->calcCost(1200) . PHP_EOL;