<?php

namespace lesson04\example04\demo09\example02;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = $this->container->get('cart');
        return $cart->getItems();
    }

    public function actionAdd($id, $count, $price)
    {
        $cart = $this->container->get('cart');
        $cart->add($id, $count, $price);
        return 'OK';
    }
}