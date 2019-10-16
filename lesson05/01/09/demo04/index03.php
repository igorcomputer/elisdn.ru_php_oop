<?php

namespace lesson04\example04\demo08;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

require_once __DIR__ . '/vendor/autoload.php';

##################################

$container = new ContainerBuilder();
$loader = new XmlFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.xml');

##################################

$cart = $container->get('cart');

$cart->add(1, 3, 100);
 