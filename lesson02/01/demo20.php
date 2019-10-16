<?php

namespace lesson02\example1\demo20;

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;

    private $firstName;
    private $lastName;
    private $type;

    public function __construct($firstName, $lastName, $type = self::TYPE_OCHN)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->type = $type;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function getType()
    {
        return $this->type;
    }

    public function isOchn()
    {
        return $this->type === self::TYPE_OCHN;
    }

    public function isZaochn()
    {
        return $this->type === self::TYPE_ZAOCHN;
    }
}

$student1 = new Student('Petya', 'Ivanov');
$student2 = new Student('Vasya', 'Petrov', Student::TYPE_OCHN);
$student3 = new Student('Kolya', 'Sifdorov', Student::TYPE_ZAOCHN);

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;
echo $student3->getFullName() . PHP_EOL;

if ($student1->isOchn()) {
    echo 'Очный' . PHP_EOL;
}