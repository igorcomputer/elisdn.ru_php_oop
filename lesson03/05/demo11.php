<?php

namespace lesson03\example5\demo11;

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
    public $x;
    public $y;
    public $z;

    public function getPointCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}

class CilindricalPoint implements Point
{
    public $f;
    public $r;
    public $h;

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
    public $r;
    public $f;
    public $t;

    public function getPointCoordinates() {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t)
        ];
    }
}

class NullPoint implements Point
{
    public function getPointCoordinates() {
        return [0, 0, 0];
    }
}

############################################

$canvas = new Canvas();

$point = new DecartPoint();

$point->x = 5;
$point->y = 7;
$point->z = -2;

echo $canvas->paint($point);

$point = new CilindricalPoint();

$point->f = 5;
$point->r = 7;
$point->h = -2;

echo $canvas->paint($point);

$point = new SphericalPoint();

$point->r = 5;
$point->f = 7;
$point->t = -2;

echo $canvas->paint($point);

$point = new NullPoint();

echo $canvas->paint($point);