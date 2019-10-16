<?php

namespace lesson04\example04\demo07;

use lesson04\example04\cart\storage\SessionStorage;
use lesson04\example04\cart\Cart;
use yii\di\Container;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

##################################

$container = \Yii::$container;

$container->set('cart.storage.session', function (Container $container) {
    return new SessionStorage('cart');
});

$container->set('cart.calculator', 'lesson04\example04\cart\cost\SimpleCost');

$container->setSingleton('cart', function (Container $container) {
    return new Cart(
        $container->get('cart.storage.session'),
        $container->get('cart.calculator')
    );
});

##################################

/** @var Cart $cart */
$cart = $container->get('cart');

$cart->add(1, 3, 100);
print_r($cart->getItems());
 