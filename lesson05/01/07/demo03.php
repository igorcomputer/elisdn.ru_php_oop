<?php

namespace lesson05\grasp\example07\demo03;

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
    private $repository;

    public function __construct(EmployeeRepository $repository) {
        $this->repository = $repository;
    }

    public function nextId() {
        $id = $this->repository->getNextId();
        return 'EMP-' . date('Ymd') . '-' . $id;
    }
}

class EmployeeRepository
{
    public function getNextId() { }
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
        $employee = new Employee($this->idGenerator->nextId(), $name);
        $this->repository->save($employee);
        return $employee;
    }
}