<?php

namespace lesson04\example02\demo09\tests\cost;

use lesson04\example02\demo09\cart\cost\CalculatorInterface;

class DummyCost implements CalculatorInterface
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getCost($items)
    {
        return $this->value;
    }
}