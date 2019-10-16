<?php

namespace lesson02\example2\demo06;

// Rewrited loading

class Student
{
    public $firstName;
    public $lastName;
    public $birthDate;

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }
}

function loadStudentsFromTxt($file) {
    $rows = file($file);
    $students = [];
    foreach ($rows as $row) {
        $values = array_map('trim', explode(';', $row));
        $student = new Student();
        $student->lastName = $values[0];
        $student->firstName = $values[1];
        $student->birthDate = $values[2];
        $students[] = $student;
    }
    return $students;
}

// ============================================

$file = __DIR__ . '/list.txt';

// --------------------------------------------

$students = loadStudentsFromTxt($file);

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

// ============================================