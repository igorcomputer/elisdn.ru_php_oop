<?php

namespace lesson05\grasp\example07\demo02;

class Employee
{
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class IdGenerator
{
    public function nextId() {
        return rand(10000, 99999);
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
    private $idGenerator;

    public function __construct(EmployeeRepository $repository, IdGenerator $idGenerator) {
        $this->repository = $repository;
        $this->idGenerator = $idGenerator;
    }

    public function recruitEmployee($name)
    {
        $id = $this->idGenerator->nextId();
        $employee = new Employee($id, $name);
        $this->repository->save($employee);
        return $employee;
    }
}