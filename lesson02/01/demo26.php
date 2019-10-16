<?php

namespace lesson02\example1\demo26;

use InvalidArgumentException;

class Student
{
    const TYPE_OCHN = 1;
    const TYPE_ZAOCHN = 2;

    private $name;
    private $type;

    public function __construct($name, $type)
    {
        if (!array_key_exists($type, self::getTypeList())) {
            throw new InvalidArgumentException('Неверный тип');
        }
        $this->name = $name;
        $this->type = $type;
    }

    public static function getTypeList()
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

print_r(Student::getTypeList());

$student = new Student('Vasya Ivanov', Student::TYPE_OCHN);

echo $student->getType() . PHP_EOL;