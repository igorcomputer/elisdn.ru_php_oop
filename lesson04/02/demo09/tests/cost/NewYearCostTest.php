<?php

namespace lesson04\example02\demo09\tests\cost;

use lesson04\example02\demo09\cart\cost\NewYearCost;

class NewYearCostTest extends \PHPUnit_Framework_TestCase
{
    public function testActive()
    {
        $calculator = new NewYearCost(new DummyCost(1000), 12, 5);
        $this->assertEquals(950, $calculator->getCost([]));
    }

    public function testNone()
    {
        $calculator = new NewYearCost(new DummyCost(1000), 6, 5);
        $this->assertEquals(1000, $calculator->getCost([]));
    }
} 