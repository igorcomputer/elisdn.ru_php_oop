<?php

use demo06\graphics\Canvas;
use demo06\points\Point;

function autoload($class) {
    echo $class . PHP_EOL;
    exit;
}

spl_autoload_register('autoload');

$canvas = new Canvas();
$point = new Point(5, 3, 7);

$canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;
 