<?php

namespace lesson02\example1\demo25;

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;

    public static function getTypeList()
    {
        return [
            self::TYPE_OCHN => 'Очный',
            self::TYPE_ZAOCHN => 'Заочный',
        ];
    }

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

print_r(Student::getTypeList());

$student = new Student('Vasya Ivanov', Student::TYPE_OCHN);

echo $student->getType() . PHP_EOL;