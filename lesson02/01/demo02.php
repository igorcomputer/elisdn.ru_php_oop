<?php

namespace lesson02\example1\demo02;

class Student
{
    public $firstName;
    public $lastName;

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

$student = new Student();

$student->firstName = 'Vasya';
$student->lastName = 'Pupkin';

echo $student->getFullName() . PHP_EOL;