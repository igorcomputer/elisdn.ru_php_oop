<?php

namespace demo02;

class Student
{
    var $firstName;
    var $lastName;
    var $birthDate;

    function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

$student = new Student();

$student->firstName = 'Vasya';
$student->lastName = 'Pupkin';

echo $student->getFullName() . PHP_EOL;