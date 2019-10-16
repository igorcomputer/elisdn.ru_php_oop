<?php

namespace lesson05\php\demo01\example02\index07;

use DirectoryIterator;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

$dir = dirname(dirname(__DIR__));

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $item) {
    echo $item->isDir() ? 'Dir: ' : 'File: ';
    echo $item->getPath() . DIRECTORY_SEPARATOR . $item->getFilename() . PHP_EOL;
}