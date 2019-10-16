<?php

namespace lesson04\example02\demo09\tests\storage;

use lesson04\example02\demo09\cart\cost\FridayCost;
use lesson04\example02\demo09\tests\cost\DummyCost;

class FridayCostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getDays
     */
    public function testCost($date, $cost)
    {
        $calculator = new FridayCost(new DummyCost(100), 5, $date);
        $this->assertEquals($cost, $calculator->getCost([]));
    }

    public function getDays()
    {
        return [
            'Monday' => ['2016-04-18', 100],
            'Tuesday' => ['2016-04-19', 100],
            'Wednesday' => ['2016-04-20', 100],
            'Thursday' => ['2016-04-21', 100],
            'Friday' => ['2016-04-22', 95],
            'Saturday' => ['2016-04-23', 100],
            'Sunday' => ['2016-04-24', 100],
        ];
    }
} 