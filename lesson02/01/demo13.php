<?php

namespace lesson02\example1\demo13;

class Student
{
    public function __get($name)
    {
        return 'Get ' . $name . PHP_EOL;
    }

    public function __set($name, $value)
    {
        echo 'Set ' . $name . ' ' . $value . PHP_EOL;
    }

    public function __isset($name)
    {
        echo 'Isset ' . $name . PHP_EOL;
    }

    public function __unset($name)
    {
        echo 'Unset ' . $name . PHP_EOL;
    }
}

$student = new Student();

$student->asdf = '001';
if (isset($student->asdf)) {

}
echo $student->asdf . PHP_EOL;
unset($student->asdf);
