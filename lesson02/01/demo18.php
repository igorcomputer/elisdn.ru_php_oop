<?php

namespace lesson02\example1\demo18;

class Student
{
    public function __invoke($id, $str)
    {
        return 'Invoke ' . $id . $str;
    }
}

$student = new Student();

echo $student(123, 'asfddf') . PHP_EOL;