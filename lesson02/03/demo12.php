<?php

namespace lesson02\example3\demo12;

##############################

class Name
{
    public $first;
    public $last;

    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }
}

class Phone
{
    public $code;
    public $number;
    public function __construct($code, $number) { }
}

class Address
{
    public $country;
    public $region;
    public $city;
    public $street;
    public $house;
    public function __construct($country, $region, $city, $street, $house) { }
}

class Employee
{
    public $id;
    public $name;
    public $phone;
    public $address;
    public function __construct($id, Name $name, Phone $phone, Address $address) { }
}

##############################

class StaffService
{
    public function recruitEmployee(Name $name, Phone $phone, Address $address)
    {
        $employee = new Employee($this->generateId(), $name, $phone, $address);
        $this->save($employee);
        return $employee;
    }
    private function generateId() { return rand(10000, 99999); }
    private function save(Employee $employee) {  }
}

##############################

$service = new StaffService();

$name = new Name('Вася', 'Пупкин');
$phone = new Phone(7, '9200000000');
$address = new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1);

$service->recruitEmployee($name, $phone, $address);

#=============================

$employee = $service->recruitEmployee(
    new Name('Вася', 'Пупкин'),
    new Phone(7, '9200000000'),
    new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1)
);

echo $employee->name->last . ' ' .  $employee->name->first . PHP_EOL;

