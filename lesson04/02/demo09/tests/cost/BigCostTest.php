<?php

namespace lesson04\example02\demo09\tests\cost;

use lesson04\example02\demo09\cart\cost\BigCost;

class BigCostTest extends \PHPUnit_Framework_TestCase
{
    public function testActive()
    {
        $calculator = new BigCost(new DummyCost(1000), 500, 3);
        $this->assertEquals(970, $calculator->getCost([]));
    }

    public function testNone()
    {
        $calculator = new BigCost(new DummyCost(300), 500, 5);
        $this->assertEquals(300, $calculator->getCost([]));
    }
} 