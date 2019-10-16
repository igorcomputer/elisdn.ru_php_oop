<?php

use demo07\graphics\Canvas;
use demo07\points\Point;

function autoload($class) {
    require_once dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
}

spl_autoload_register('autoload');

$canvas = new Canvas();
$point = new Point(5, 3, 7);

$canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;
 