<?php

namespace lesson03\example5\demo08;

use Exception;

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

    public function line(Point $from, Point $to)
    {
        if ($from instanceof DecartPoint) {
            $x1 = $from->x;
            $y1 = $from->y;
            $z1 = $from->z;
        } elseif ($from instanceof CilindricalPoint) {
            $x1 = $from->r * cos($from->f);
            $y1 = $from->r * sin($from->f);
            $z1 = $from->h;
        } elseif ($from instanceof SphericalPoint) {
            $x1 = $from->r * cos($from->f) * sin($from->t);
            $y1 = $from->r * sin($from->f) * cos($from->t);
            $z1 = $from->r * cos($from->t);
        } else {
            throw new Exception('Unsupported coordinat system');
        }
        if ($to instanceof DecartPoint) {
            $x2 = $to->x;
            $y2 = $to->y;
            $z2 = $to->z;
        } elseif ($to instanceof CilindricalPoint) {
            $x2 = $to->r * cos($to->f);
            $y2 = $to->r * sin($to->f);
            $z2 = $to->h;
        } elseif ($to instanceof SphericalPoint) {
            $x2 = $to->r * cos($to->f) * sin($to->t);
            $y2 = $to->r * sin($to->f) * cos($to->t);
            $z2 = $to->r * cos($to->t);
        } else {
            throw new Exception('Unsupported coordinat system');
        }
        return "[x = $x1; y = $y1; z = $z1] - [x = $x2; y = $y2; z = $z2]\n";
    }
}

abstract class Point
{
}

class DecartPoint extends Point
{
    public $x;
    public $y;
    public $z;
}

class CilindricalPoint extends Point
{
    public $f;
    public $r;
    public $h;
}

class SphericalPoint extends Point
{
    public $r;
    public $f;
    public $t;
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