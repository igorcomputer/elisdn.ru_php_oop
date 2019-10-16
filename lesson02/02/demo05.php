<?php

namespace lesson02\example2\demo05;

// Added class

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
        $students[] = [
            'firstName' => $values[1],
            'lastName' => $values[0],
            'birthDate' => $values[2],
        ];
    }
    return $students;
}

// ============================================

$file = __DIR__ . '/list.txt';

// --------------------------------------------

$students = loadStudentsFromTxt($file);

foreach ($students as $student) {
    echo $student['lastName'] . ' ' . $student['firstName'] . ' ' . $student['birthDate'] . PHP_EOL;
}

// ============================================