<?php

namespace lesson02\example1\demo04;

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
$student2 = $student1;

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;

$student1 = null;
unset($student2);

