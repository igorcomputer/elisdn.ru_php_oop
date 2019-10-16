<?php

namespace lesson02\example2\demo09;

// Load

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

    public static function loadFromTxt($file) {
        $rows = file($file);
        $students = [];
        foreach ($rows as $row) {
            $values = array_map('trim', explode(';', $row));
            $students[] = new Student($values[0], $values[1], $values[2]);
        }
        return $students;
    }

    public static function saveToTxt($students, $file) {
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
}

// ============================================

$file = __DIR__ . '/list.txt';

// --------------------------------------------

$students = Student::loadFromTxt($file);

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

Student::saveToTxt($students, $file);

// ============================================