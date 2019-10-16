<?php

namespace lesson03\example5\demo09;

class Canvas
{
    public function paint(Point $point)
    {
        if ($point instanceof DecartPoint) {
            $x = $point->x;
            $y = $point->y;
            $z = $point->z;
        } elseif ($point instanceof CilindricalPoint) {
            $x = $point->r * cos($point->f);
            $y = $point->r * sin($point->f);
            $z = $point->h;
        } elseif ($point instanceof SphericalPoint) {
            $x = $point->r * cos($point->f) * sin($point->t);
            $y = $point->r * sin($point->f) * cos($point->t);
            $z = $point->r * cos($point->t);
        } else {
            throw new Exception('Unsupported coordinat system');
        }
        return "[x = $x; y = $y; z = $z]\n";
    }

    // ...
}

abstract class Point
{
    abstract public function getPointCoordinates();
}

class DecartPoint extends Point
{
    public $x;
    public $y;
    public $z;

    public function getPointCoordinates() {
        return [$this->x, $this->y, $this->z];
    }
}

class CilindricalPoint extends Point
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

class SphericalPoint extends Point
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