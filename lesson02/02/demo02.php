<?php

namespace lesson02\example2\demo02;

function loadStudentsFromTxt($file)
{
    $rows = file($file);
    $students = [];
    foreach ($rows as $row) {
        $values = array_map('trim', explode(';', $row));
        $students[] = [
            'lastName' => $values[0],
            'firstName' => $values[1],
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