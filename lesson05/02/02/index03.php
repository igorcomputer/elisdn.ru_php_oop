<?php

namespace lesson05\php\demo01\example02\index07;

use RecursiveArrayIterator;
use RecursiveIteratorIterator;

$iterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator([
        1 => [
            [111, 112, 113],
            [121, 122, 123],
        ],
        2 => [
            [211, 212, 213],
        ],
    ])
);

foreach ($iterator as $item) {
    echo $item . PHP_EOL;
}