<?php

namespace lesson04\example04\cart\cost;

use lesson04\example04\cart\CartItem;

interface CalculatorInterface
{
    /**
     * @param CartItem[] $items
     * @return float
     */
    public function  getCost($items);
} 