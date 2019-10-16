<?php

namespace lesson04\example04\demo08;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

require_once __DIR__ . '/vendor/autoload.php';

$container = new ContainerBuilder();

$container->setParameter('cart.storage.session_key', 'cart');

$container
    ->register('cart.storage.session', 'cart\storage\SessionStorage')
    ->addArgument('%cart.storage.session_key%')
    ->setShared(false);

$container
    ->register('cart.calculator', 'cart\cost\SimpleCost');

$container
    ->register('cart', 'cart\Cart')
    ->addArgument(new Reference('cart.storage.session'))
    ->addArgument(new Reference('cart.calculator'));

##################################

$cart = $container->get('cart');

$cart->add(1, 3, 100);
 