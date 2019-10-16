<?php

namespace lesson05\php\demo01\example02\index07;

use DirectoryIterator;

$dir = dirname(dirname(__DIR__));

$iterator = new DirectoryIterator($dir);

foreach ($iterator as $item) {
    echo $item->isDir() ? 'Dir: ' : 'File: ';
    echo $item->getFilename() . PHP_EOL;
}