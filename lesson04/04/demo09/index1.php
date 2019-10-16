<?php

namespace lesson04\example04\demo09\example01;

use lesson04\example04\cart\storage\SessionStorage;
use lesson04\example04\cart\Cart;
use lesson04\example04\cart\cost\SimpleCost;

class CartController
{
    public function actionIndex()
    {
        $cart = new Cart(new SessionStorage('cart'), new SimpleCost());
        return $cart->getItems();
    }

    public function actionAdd($id, $count, $price)
    {
        $cart = new Cart(new SessionStorage('cart'), new SimpleCost());
        $cart->add($id, $count, $price);
        return 'OK';
    }
}