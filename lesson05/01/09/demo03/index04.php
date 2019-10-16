<?php

namespace lesson05\grasp\example09\demo03;

require_once __DIR__ . '/vendor/autoload.php';

$purifier = new \HTMLPurifier();

$html = <<<EOL
    <p>Comment</p>
    <p>See more in [#158] and [#162] issues.</p>
    <p>And also [#152].</p>
EOL;

echo $purifier->purify($html) . PHP_EOL;
