<?php

namespace lesson02\example3\demo17;

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
    private $phones;
    private $address;

    public function __construct($id, Name $name, array $phones, Address $address) {
        foreach ($phones as $phone) {
            if (!$phone instanceof Phone) {
                throw new \InvalidArgumentException('Incorrect phone.');
            }
        }
        $this->id = $id;
        $this->name = $name;
        $this->phones = $phones;
        $this->address = $address;
    }

    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPhones() { return $this->phones; }
    public function getAddress() { return $this->address; }

    public function rename(Name $name)
    {
        $this->name = $name;
    }

    public function addPhone(Phone $phone)
    {
        foreach ($this->phones as $item) {
            if ($item->code == $phone->code && $item->number == $phone->number) {
                throw new \Exception('Phone already exists.');
            }
        }
        $this->phones[] = $phone;
    }

    public function removePhone(Phone $phone)
    {
        foreach ($this->phones as $i => $item) {
            if ($item->code == $phone->code && $item->number == $phone->number) {
                unset($this->phones[$i]);
                return;
            }
        }
        throw new \Exception('Phone not found.');
    }

    public function changeAddress(Address $address)
    {
        $this->address = $address;
    }
}

##############################

class StaffService
{
    public function recruitEmployee(Name $name, Phone $phone, Address $address)
    {
        $employee = new Employee($this->generateId(), $name, [$phone], $address);
        $this->save($employee);
        return $employee;
    }

    public function addEmployeePhone($id, Phone $phone)
    {
        $employee = $this->find($id);
        $employee->addPhone($phone);
        $this->save($employee);
    }

    public function removeEmployeePhone($id, Phone $phone)
    {
        $employee = $this->find($id);
        $employee->removePhone($phone);
        $this->save($employee);
    }

    private function generateId() { return rand(10000, 99999); }
    private function find($id) { return null; }
    private function save(Employee $employee) {  }
}

##############################

$service = new StaffService();

$empoyee = $service->recruitEmployee(
    new Name('Вася', 'Пупкин'),
    new Phone(7, '92000000000'),
    new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1)
);

echo $empoyee->getName()->getFull();

