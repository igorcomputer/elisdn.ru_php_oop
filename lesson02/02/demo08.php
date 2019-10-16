<?php

namespace lesson02\example2\demo08;

// Added constructor

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

function loadStudentsFromTxt($file) {
    $rows = file($file);
    $students = [];
    foreach ($rows as $row) {
        $values = array_map('trim', explode(';', $row));
        $students[] = new Student($values[0], $values[1], $values[2]);
    }
    return $students;
}

function saveStudentsToTxt(array $students, $file) {
    $rows = [];
    foreach ($students as $student) {
        $rows[] = implode(';', [
            $student->lastName,
            $student->firstName,
            $student->birthDate,
        ]);
    }
    file_put_contents($file, implode(PHP_EOL, $rows));
}

// ============================================

$file = __DIR__ . '/list.txt';

// --------------------------------------------

$students = loadStudentsFromTxt($file);

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

saveStudentsToTxt($students, $file);

// ============================================