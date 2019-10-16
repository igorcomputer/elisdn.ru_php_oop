<?php

namespace lesson05\grasp\example06\demo01;

###############################################

interface Point
{
    public function getPaintCoordinates();
}

class Canvas
{
    public function paint(Point $point)
    {
        // ...
    }

    public function line(Point $from, Point $to)
    {
        // ...
    }
}

###############################################

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

    public function getPaintCoordinates() {
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

    public function getPaintCoordinates() {
        return [
            $this->r * cos($this->f) * sin($this->t),
            $this->r * sin($this->f) * cos($this->t),
            $this->r * cos($this->t)
        ];
    }
}

############################################

$canvas = new Canvas();

echo $canvas->paint(new CilindricalPoint(8, 6, 1));
echo $canvas->paint(new SphericalPoint(4, -2, 8));

echo $canvas->line(new SphericalPoint(4, 1.3, 8), new CilindricalPoint(8, 6, 1));