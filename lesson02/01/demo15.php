<?php

namespace lesson02\example1\demo15;

class Student
{
    public function __call($name, $params)
    {
        return 'Call ' . $name . ' ' . print_r($params, true);
    }
}

$student = new Student();

echo $student->move(123, 12) . PHP_EOL;