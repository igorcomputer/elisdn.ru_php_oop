<?php

namespace lesson02\example1\demo14;

class Student
{
    private $attributes = [];

    public function __get($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

    public function __unset($name)
    {
        unset($this->attributes[$name]);
    }
}

$student = new Student();

$student->number = '001';
echo $student->number . PHP_EOL;