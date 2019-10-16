<?php

namespace demo05;

class Student
{
    var $firstName;
    var $lastName;
    var $birthDate;
}

$student1 = new Student();

$student2 = $student1;
$student3 = clone $student1;
$student4 = $student1;

var_dump($student1);
var_dump($student2);
var_dump($student3);
var_dump($student4);