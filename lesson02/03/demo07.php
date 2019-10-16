<?php

namespace lesson02\example3\demo07;

class Discount
{
    private $limit;
    private $percent;

    public function __construct($limit, $percent)
    {
        $this->limit = $limit;
        $this->percent = $percent;
    }

    public function calcCost($cost)
    {
        if ($cost >= $this->limit) {
            return $cost * (1 - $this->percent / 100);
        } else {
            return $cost;
        }
    }
}

$discount1 = new Discount(1000, 5);
$discount2 = new Discount(2000, 7);

echo $discount1->calcCost(1200) . PHP_EOL;
echo $discount2->calcCost(1200) . PHP_EOL;

###################################

$cost1 = $discount1->calcCost(1200);
echo $discount2->calcCost($cost1) . PHP_EOL;

echo $discount2->calcCost($discount1->calcCost(1200)) . PHP_EOL;