<?php

namespace demo08\points;

use demo08\graphics\Point as BasePoint;

class Point implements BasePoint
{
    public $x;
    public $y;
    public $z;

    public function getPointCoordinates() {
        return [$this->x, $this->y, $this->z];
    }

    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }
}