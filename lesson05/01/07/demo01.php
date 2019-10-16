<?php

namespace lesson05\grasp\example07\demo01;

class Employee
{
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class EmployeeRepository
{
    public function find($id) { }
    public function save(Employee $employee) { }
}

class StaffService
{
    private $repository;

    public function __construct(EmployeeRepository $repository) {
        $this->repository = $repository;
    }

    public function recruitEmployee($name)
    {
        $id = rand(10000, 99999);
        $employee = new Employee($id, $name);
        $this->repository->save($employee);
        return $employee;
    }
}