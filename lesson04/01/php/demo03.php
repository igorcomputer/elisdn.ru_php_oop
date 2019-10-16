<?php

namespace demo03\graphics
{
    interface Point {
        public function getPointCoordinates();
    }

    class Canvas {
        public function paint(Point $point) {
            list($x, $y, $z) = $point->getPointCoordinates();
            echo "[x = $x; y = $y; z = $z]\n";
        }
    }
}

namespace demo03\points
{
    use demo03\graphics\Point as BasePoint;

    class Point implements BasePoint
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
}

namespace
{
    use demo03\graphics\Canvas;
    use demo03\points\Point;

    $canvas = new Canvas();
    $point = new Point(5, 3, 7);

    $canvas->paint($point);

    echo get_class($canvas) . PHP_EOL;
    echo get_class($point) . PHP_EOL;
}