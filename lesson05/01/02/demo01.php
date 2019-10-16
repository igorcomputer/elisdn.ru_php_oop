<?php

namespace lesson05\grasp\example02\demo01;

use lesson04\example02\demo09\cart\Cart;
use lesson04\example02\demo09\cart\cost\SimpleCost;
use lesson04\example02\demo09\cart\storage\SessionStorage;

$cart = new Cart(new SessionStorage('cart'), new SimpleCost());

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;