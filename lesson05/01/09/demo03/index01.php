<?php

namespace lesson05\grasp\example09\demo03;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$purifier = new \HTMLPurifier();

$html = <<<EOL
    <div>
        <script>alert(1);</script>
        <p onclick="alert(1)">Danger Code</p>
    </div>
EOL;

echo $purifier->purify($html) . PHP_EOL;
