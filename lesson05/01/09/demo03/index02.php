<?php

namespace lesson05\grasp\example09\demo03;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$purifier = new \HTMLPurifier([
    'AutoFormat.AutoParagraph' => true,
    'HTML.Allowed' => 'p,ul,li,b,i,a[href],pre,div',
    'AutoFormat.Linkify' => true,
    'HTML.Nofollow' => true,
    'Core.EscapeInvalidTags' => true,
]);

$html = <<<EOL
<div>
    <script>alert(1);</script>
    <p>Danger Code with link http://site.com</p>
</div>
EOL;

echo $purifier->purify($html) . PHP_EOL;
