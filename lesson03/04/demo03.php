<?php

namespace lesson03\example4\demo03;

class Measurer
{
    public function maxSize($obj) {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

class Table
{
    public function getWidth() { return 95; }
    public function getHeight() { return 12; }
    public function getColor() { return 0xFF0000; }
    public function getMaterial() { return 'wood'; }
}

class Kettle
{
    public function move($x, $y) {  }
    public function getWidth() { return 9; }
    public function getHeight() { return 4; }
    public function getColor() { return 0xFF0000; }
}

class Border
{
    public function getWidth() { return 9; }
    public function getHeight() { return 4; }
}

class Lamp
{
    public function move($x, $y) {  }
    public function getColor() { return 0x00A900; }
}

$measurer = new Measurer();

$table = new Table();
$kettle = new Kettle();

echo $measurer->maxSize($table) . PHP_EOL;
echo $measurer->maxSize($kettle) . PHP_EOL;