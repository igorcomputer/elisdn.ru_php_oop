<?php

namespace lesson05\php\demo01\example01\index01;

$phones = ['88001', '88002', '88003'];

foreach ($phones as $phone) {
    echo $phone . PHP_EOL;
}

echo $phones[2] . PHP_EOL;

$phones[2] = '88007';

$phones[] = '88006';