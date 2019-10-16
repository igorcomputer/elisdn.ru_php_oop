<?php

namespace lesson05\php\demo01\example02\index07;

use ArrayIterator;

$iterator = new ArrayIterator([111, 112, 113]);

foreach ($iterator as $item) {
    echo $item . PHP_EOL;
}