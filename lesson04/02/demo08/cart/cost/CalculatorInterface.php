<?php

namespace lesson04\example02\demo08\cart\cost;

use lesson04\example02\demo08\cart\CartItem;

interface CalculatorInterface
{
    /**
     * @param CartItem[] $items
     * @return float
     */
    public function getCost(array $items);
} 