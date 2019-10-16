<?php

namespace lesson03\example4\demo06;

interface Measurable
{
    public function getWidth();
    public function getHeight();
}

class Measurer
{
    public function maxSize(Measurable $obj) {
        return max($obj->getWidth(), $obj->getHeight());
    }
}

class Table implements Measurable
{
    public function getWidth() { return 95; }
    public function getHeight() { return 12; }
    public function getPoligons() { return []; }
    public function getColor() { return 0xFF0000; }
}

class Kettle implements Measurable
{
    public function move($x, $y) {  }
    public function getWidth() { return 9; }
    public function getHeight() { return 4; }
    public function getPoligons() { return []; }
    public function getColor() { return 0xFF0000; }
}

class Border implements Measurable
{
    public function getWidth() { return 9; }
    public function getHeight() { return 4; }
}

class Lamp
{
    public function move($x, $y) {  }
    public function getPoligons() { return []; }
    public function getColor() { return 0x00A900; }
}

$measurer = new Measurer();

$table = new Table();

echo $measurer->maxSize($table) . PHP_EOL;