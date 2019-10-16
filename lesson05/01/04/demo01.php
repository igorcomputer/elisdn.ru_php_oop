<?php

namespace lesson05\grasp\example04\demo01;

class CartItem
{
    public function getCount() {}
}

class Cart
{
    /** @var CartItem[] */
    private $items;
    private $storage;
    private $calculator;

    public function __construct(Storage $storage, Calculator $calculator)
    {
        $this->storage = $storage;
        $this->calculator = $calculator;
    }

    public function set($id, $count, $price)
    {
        $this->loadItems();
        $this->items[$id] = new CartItem($id, $count, $price);
        $this->saveItems();
    }

    // ...

    public function getCost()
    {
        $this->loadItems();
        return $this->calculator->getCost($this->items);
    }

    private function loadItems()
    {
        $this->items = $this->storage->load();
    }

    private function saveItems()
    {
        $this->storage->save($this->items);
    }
}

class Storage
{
    public function load() {}
    public function save(array $items) {}
}

class Calculator
{
    public function getCost(array $items) {}
}