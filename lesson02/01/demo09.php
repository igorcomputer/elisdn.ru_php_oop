<?php

namespace lesson02\example1\demo09;

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

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

$student = new Student();

$student->rename('Petya', 'Ivanov');

echo $student->getFirstName() . PHP_EOL;
echo $student->getLastName() . PHP_EOL;
echo $student->getFullName() . PHP_EOL;