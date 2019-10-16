<?php

namespace lesson02\example1\demo21;

class Student
{
    public static $val;

    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }
}

Student::$val = 15;

echo Student::$val . PHP_EOL;