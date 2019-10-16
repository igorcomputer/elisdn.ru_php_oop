<?php

namespace lesson04\example02\demo09\tests\storage;

use lesson04\example02\demo09\cart\cost\BirthdayCost;
use lesson04\example02\demo09\tests\cost\DummyCost;

class BirthdayCostTest extends \PHPUnit_Framework_TestCase
{
    public function testActive()
    {
        $calc = new BirthdayCost(new DummyCost(100), 5, '1988-04-12', '2016-04-12');
        $this->assertEquals(95, $calc->getCost([]));
    }

    public function testNone()
    {
        $calc = new BirthdayCost(new DummyCost(100), 5, '1988-05-12', '2016-04-12');
        $this->assertEquals(100, $calc->getCost([]));
    }
} 