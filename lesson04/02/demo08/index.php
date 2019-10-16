<?php

use lesson04\example02\demo08\cart\Cart;
use lesson04\example02\demo08\cart\cost\SimpleCost;
use lesson04\example02\demo08\cart\storage\SessionStorage;

require_once __DIR__ . '/vendor/autoload.php';

$storage = new SessionStorage('cart');

$calculator = new SimpleCost();

$cart = new Cart($storage, $calculator);

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;