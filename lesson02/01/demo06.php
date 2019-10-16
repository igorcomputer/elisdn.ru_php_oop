<?php

namespace lesson02\example1\demo06;

class Student
{
    public $firstName;
    public $lastName;

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function rename($firstName, $lastName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }
}

$student = new Student();

$student->firstName = 'Vasya';
$student->lastName = 'Pupkin';

echo $student->getFullName() . PHP_EOL;

$student->rename('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;