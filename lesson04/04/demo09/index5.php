<?php

namespace lesson04\example04\demo09\example05;

use Illuminate\Routing\Controller;
use lesson04\example04\cart\Cart;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function actionIndex()
    {
        return response()->json($this->cart->getItems());
    }

    public function actionAdd($id, $count, $price)
    {
        $this->cart->add($id, $count, $price);
        return response()->json('OK');
    }
}