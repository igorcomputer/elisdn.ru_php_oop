<?php

namespace lesson02\example2\demo13;

// XML repository

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
            $students[] = new Student($values[0], $values[1], new \DateTime($values[2]));
        }
        return $students;
    }

    public function findAllByBirthDate($date)
    {
        $rows = file($this->file);
        $students = [];
        foreach ($rows as $row) {
            $values = array_map('trim', explode(';', $row));
            if ($values[2] == $date) {
                $students[] = new Student($values[0], $values[1], $values[2]);
            }
        }
        return $students;
    }
}

class XMLStudentRepository
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function findAll() {
        $rows = simplexml_load_file($this->file);
        $students = [];
        foreach ($rows->student as $row) {
            $students[] = new Student($row->lastName, $row->firstName, $row->birthDate);
        }
        return $students;
    }
}

class RepositoryFactory
{
    public static function create($type, $file)
    {
        switch ($type) {
            case 'txt':
                $studentRepository = new TXTStudentRepository($file);
                break;
            case 'xml':
                $studentRepository = new XMLStudentRepository($file);
                break;
            default:
                die('Incorrect type ' . $type);
        }
        return $studentRepository;
    }
}

// ============================================

$type = 'xml';
$file = __DIR__ . '/list.xml';

$studentRepository = RepositoryFactory::create($type, $file);

###############################################

$students = $studentRepository->findAllByBirthDate('1990-12-21');

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

// ============================================