<?php

namespace lesson02\example1\demo03;

class Student
{
    public $firstName;
    public $lastName;

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

$student1 = new Student();
$student2 = new Student();
$student3 = new Student();
$student4 = new Student();
$student5 = new Student();
$student6 = new Student();

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;
echo $student3->getFullName() . PHP_EOL;
echo $student4->getFullName() . PHP_EOL;
echo $student5->getFullName() . PHP_EOL;
echo $student6->getFullName() . PHP_EOL;