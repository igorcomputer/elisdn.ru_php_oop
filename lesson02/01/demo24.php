<?php

namespace lesson02\example1\demo24;

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;

    private $name;
    private $type;

    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getTypeList()
    {
        return [
            self::TYPE_OCHN => 'Очный',
            self::TYPE_ZAOCHN => 'Заочный',
        ];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }
}

$student = new Student('Vasya Ivanov', Student::TYPE_OCHN);

print_r($student->getTypeList());

echo $student->getType() . PHP_EOL;