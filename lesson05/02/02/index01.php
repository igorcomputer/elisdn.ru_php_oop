<?php

namespace lesson05\php\demo01\example02\index07;

use ArrayObject;

$phones = new ArrayObject(['88001', '88002', '88003']);

$phones->append('88003');

$phones[] = '88003';

foreach ($phones as $phone) {
    echo $phone . PHP_EOL;
}

echo $phones[3] . PHP_EOL;
