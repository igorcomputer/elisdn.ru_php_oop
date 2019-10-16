<?php

namespace lesson02\example3\demo11;

##############################

class Name
{
    public $first;
    public $last;
}

class Phone
{
    public $code;
    public $number;
}

class Address
{
    public $country;
    public $region;
    public $city;
    public $street;
    public $house;
}

class Employee
{
    public $id;
    public $name;
    public $phone;
    public $address;
}

##############################

class StaffService
{
    public function recruitEmployee(Name $name, Phone $phone, Address $address)
    {
        $employee = new Employee();
        $employee->id = $this->generateId();
        $employee->name = $name;
        $employee->phone = $phone;
        $employee->address = $address;

        $this->save($employee);

        return $employee;
    }

    private function generateId()
    {
        return rand(10000, 99999);
    }

    private function save(Employee $employee) {
        // ...
    }
}

##############################

$name = new Name();
$name->first = 'Вася';
$name->last = 'Пупкин';

$phone = new Phone();
$phone->code = 7;
$phone->number = '9200000000';

$address = new Address();
$address->country = 'Россия';
$address->region = 'Липецкая обл.';
$address->city = 'г. Пушкин';
$address->street = 'ул. Ленина';
$address->house = 1;

$service = new StaffService();
$employee = $service->recruitEmployee($name, $phone, $address);

echo $employee->phone->number . PHP_EOL;

// Data Transfer Object DTO

