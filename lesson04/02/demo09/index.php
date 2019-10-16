<?php

use lesson04\example02\demo09\cart\Cart;
use lesson04\example02\demo09\cart\cost\BirthdayCost;
use lesson04\example02\demo09\cart\cost\FridayCost;
use lesson04\example02\demo09\cart\cost\MinCost;
use lesson04\example02\demo09\cart\cost\NewYearCost;
use lesson04\example02\demo09\cart\cost\SimpleCost;
use lesson04\example02\demo09\cart\storage\YiiDbStorage;
use lesson04\example02\demo09\cart\storage\HybridStorage;
use lesson04\example02\demo09\cart\storage\YiiSessionStorage;

require_once __DIR__ . '/vendor/autoload.php';

$sessionStorage = new YiiSessionStorage('cart');

if (!Yii::$app->user->isGuest) {
    $storage = new HybridStorage(
        $sessionStorage,
        new YiiDbStorage(Yii::$app->user->id)
    );
} else {
    $storage = $sessionStorage;
}

$simpleCost = new SimpleCost();
$calculator = new MinCost(
    new FridayCost($simpleCost, 5, date('Y-m-d')),
    new NewYearCost($simpleCost, date('m'), 3)
);

if (!Yii::$app->user->isGuest) {
    $calculator = new BirthdayCost($calculator, 7, Yii::$app->user->identity->birthDate, date('Y-m-d'));
}

$cart = new Cart($storage, $calculator);

$cart->add(5, 6, 100);

echo $cart->getCost() . PHP_EOL;