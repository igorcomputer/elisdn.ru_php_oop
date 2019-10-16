<?php

namespace lesson02\example3\demo14;

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

    public function getFull() {
        return $this->last . ' ' . $this->first;
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
    private $id;
    private $name;
    private $phone;
    private $address;

    public function __construct($id, Name $name, Phone $phone, Address $address) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }
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

$empoyee = $service->recruitEmployee(
    new Name('Вася', 'Пупкин'),
    new Phone(7, '9200000000'),
    new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1)
);

echo $empoyee->getName()->getFull() . PHP_EOL;

