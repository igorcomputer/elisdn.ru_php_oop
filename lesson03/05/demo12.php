<?php

namespace lesson03\example5\demo12;

############################################

interface Point
{
    public function getPointCoordinates();
}

class Canvas
{
    public function paint(Point $point)
    {
        list($x, $y, $z) = $point->getPointCoordinates();
        return "[x = $x; y = $y; z = $z]\n";
    }

    public function line(Point $from, Point $to)
    {
        list($x1, $y1, $z1) = $from->getPointCoordinates();
        list($x2, $y2, $z2) = $to->getPointCoordinates();
        return "[x = $x1; y = $y1; z = $z1] - [x = $x2; y = $y2; z = $z2]\n";
    }
}

############################################

class DecartPoint implements Point
{
    private $x;
    private $y;
    private $z;

    public function __construct($x, $y, $z) {
        $this->x = $x;
        $this->y = $y;
        $this->x = $x;
    }

    public function getPointCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}

class CilindricalPoint implements Point
{
    private $f;
    private $r;
    private $h;

    public function __construct($f, $r, $h) {
        $this->f = $f;
        $this->r = $r;
        $this->h = $h;
    }

    public function getPointCoordinates() {
        return [
            $this->r * cos($this->f),
            $this->r * sin($this->f),
            $this->h
        ];
    }
}

class SphericalPoint implements Point
{
    private $r;
    private $f;
    private $t;

    public function __construct($r, $f, $t) {
        $this->r = $r;
        $this->f = $f;
        $this->t = $t;
    }

    public function getPointCoordinates() {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t)
        ];
    }
}

############################################

$canvas = new Canvas();

echo $canvas->paint(new DecartPoint(5, 7, -2));
echo $canvas->paint(new CilindricalPoint(8, 6, 1));
echo $canvas->paint(new SphericalPoint(4, -2, 8));

echo $canvas->line(new SphericalPoint(4, 1.3, 8), new CilindricalPoint(8, 6, 1));