<?php

namespace lesson02\example1\demo19;

const STUDENT_TYPE_OCHN = 1;
const STUDENT_TYPE_ZAOCHN = 2;

class Student
{
    private $firstName;
    private $lastName;
    private $type;

    public function __construct($firstName, $lastName, $type = null)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->type = $type ? $type : STUDENT_TYPE_OCHN;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function getType()
    {
        return $this->type;
    }
}

$student1 = new Student('Petya', 'Ivanov');
$student2 = new Student('Vasya', 'Petrov', STUDENT_TYPE_OCHN);
$student3 = new Student('Kolya', 'Sifdorov', STUDENT_TYPE_ZAOCHN);

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;
echo $student3->getFullName() . PHP_EOL;