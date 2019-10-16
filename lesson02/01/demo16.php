<?php

namespace lesson02\example1\demo16;

class Student
{
    public function __toString()
    {
        return 'Cool object';
    }
}

$student = new Student();

echo 'I print ' . $student . PHP_EOL;