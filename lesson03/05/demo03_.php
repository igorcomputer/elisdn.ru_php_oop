<?php

namespace lesson03\example5\demo03;

class Canvas
{
    public function paintDecart($x, $y, $z)
    {
        return "[x = $x; y = $y; z = $z]\n";
    }

    public function lineDecart($x1, $y1, $z1, $x2, $y2, $z2)
    {
        return "[x = $x1; y = $y1; z = $z1] - [x = $x2; y = $y2; z = $z2]\n";
    }

    public function paintCilindrical($f, $r, $h)
    {
        return $this->paintDecart($r * cos($f), $r * sin($f), $h);
    }

    public function lineCilindrical($f1, $r1, $h1, $f2, $r2, $h2)
    {
        return $this->lineDecart($r1 * cos($f1), $r1 * sin($f1), $h1, $r2 * cos($f2), $r2 * sin($f2), $h2);
    }

    public function lineDecartToCilindrical($x, $y, $z, $f, $r, $h)
    {
        return $this->lineDecart($x, $y, $z, $r * cos($f), $r * sin($f), $h);
    }

    public function lineCilindricalToDecart($f, $r, $h, $x, $y, $z)
    {
        return $this->lineDecart($r * cos($f), $r * sin($f), $h, $x, $y, $z);
    }
}

############################################

$canvas = new Canvas();

$x = 5;
$y = 7;
$z = -2;

echo $canvas->paintDecart($x, $y, $z);

$f = 1.7;
$r = 15;
$h = 10;

echo $canvas->paintCilindrical($f, $r, $h);