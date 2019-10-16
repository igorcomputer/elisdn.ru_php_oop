<?php

namespace lesson02\example1\demo08;

use InvalidArgumentException;

class Student
{
    private $firstName;
    private $lastName;

    public function rename($firstName, $lastName)
    {
        if (empty($firstName) || empty($lastName)) {
            throw new InvalidArgumentException('Введите имя и фамилию');
        }
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

$student = new Student();

$student->rename('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;