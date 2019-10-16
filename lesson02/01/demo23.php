<?php

namespace lesson02\example1\demo23;

function getTypeList()
{
    return [
        Student::TYPE_OCHN => 'Очный',
        Student::TYPE_ZAOCHN => 'Заочный',
    ];
}

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

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }
}

print_r(getTypeList());

$student = new Student('Vasya Ivanov', Student::TYPE_OCHN);

echo $student->getType() . PHP_EOL;