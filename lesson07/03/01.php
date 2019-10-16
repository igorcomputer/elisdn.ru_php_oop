<?php

namespace other\example02\demo01;

class Example
{
    public $public = 'public';
    protected $protected = 'protected';
    private $private = 'private';

    public function echoAllDynamic(Example $other)
    {
        echo $other->protected . PHP_EOL;
        echo $other->public . PHP_EOL;
        echo $other->private . PHP_EOL;
    }

    public static function echoAllStatic(Example $other)
    {
        echo $other->protected . PHP_EOL;
        echo $other->public . PHP_EOL;
        echo $other->private . PHP_EOL;
    }
}

$first = new Example();
$second = new Example();

$first->echoAllDynamic($second);

Example::echoAllStatic($second);
