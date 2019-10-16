<?php

namespace lesson05\grasp\example09\demo03;

use HTMLPurifier_Filter;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

class IssueFilter extends HTMLPurifier_Filter
{
    public function postFilter($html, $config, $context)
    {
        return preg_replace_callback('/\[#(\d+)\]/', function ($matches) {
            return '<a href="/issues/' . $matches[1] . '">' . $matches[1] . '</a>';
        }, $html);
    }
}

$purifier = new \HTMLPurifier([
    'Filter.Custom' => [
        new IssueFilter(),
    ]
]);

$html = <<<EOL
    <p>Comment</p>
    <p>See more in [#158] and [#162] issues.</p>
    <p>And also [#152].</p>
EOL;

echo $purifier->purify($html) . PHP_EOL;
