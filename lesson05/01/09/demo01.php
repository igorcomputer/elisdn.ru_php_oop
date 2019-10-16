<?php

namespace lesson05\grasp\example09\demo01;

###############################################

class Cart
{
    private $storage;
    private $calculator;

    public function __construct(StorageInterface $storage, CalculatorInterface $calculator)
    {
        $this->storage = $storage;
        $this->calculator = $calculator;
    }

    // ...
}

interface StorageInterface
{
    public function load();
    public function save(array $items);
}

interface CalculatorInterface
{
    public function getCost(array $items);
}

###############################################

class CookieStorage implements StorageInterface
{
    public function load() {}
    public function save(array $items) {}
}

class DbStorage implements StorageInterface
{
    public function load() {}
    public function save(array $items) {}
}