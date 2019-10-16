<?php

namespace lesson02\example2\demo12;

// TXTStudentRepository

class Student
{
    public $lastName;
    public $firstName;
    public $birthDate;

    public function __construct($lastName, $firstName, $birthDate) {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->birthDate = $birthDate;
    }

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }
}

class TXTStudentRepository
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function findAll() {
        $rows = file($this->file);
        $students = [];
        foreach ($rows as $row) {
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values[0], $values[1], $values[2]);
        }
        return $students;
    }
}

// ============================================

$studentRepository = new TXTStudentRepository(__DIR__ . '/list.txt');

// --------------------------------------------

$students = $studentRepository->findAll();

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

// ============================================