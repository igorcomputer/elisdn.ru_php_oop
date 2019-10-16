<?php

use lesson04\example02\demo06\cart\Cart;

require_once __DIR__ . '/vendor/autoload.php';

$cart = new Cart();

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;