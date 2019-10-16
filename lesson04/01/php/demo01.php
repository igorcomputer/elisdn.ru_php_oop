<?php

##################################

interface Point {
    public function getPointCoordinates();
}

class Canvas {
    public function paint(Point $point) {
        list($x, $y, $z) = $point->getPointCoordinates();
        echo "[x = $x; y = $y; z = $z]\n";
    }
}

##################################

class DecartPoint implements Point
{
    public $x;
    public $y;
    public $z;

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getPointCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}

##################################

$canvas = new Canvas();
$point = new DecartPoint(5, 3, 7);

$canvas->paint($point);

echo get_class($canvas) . PHP_EOL;
echo get_class($point) . PHP_EOL;