<?php

namespace lesson04\example04\demo09\example03;

use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionIndex()
    {
        $cart = Yii::createObject('lesson04\example04\cart\Cart');
        return $cart->getItems();
    }

    public function actionAdd($id, $count, $price)
    {
        $cart = Yii::createObject('lesson04\example04\cart\Cart');
        $cart->add($id, $count, $price);
        return 'OK';
    }
}