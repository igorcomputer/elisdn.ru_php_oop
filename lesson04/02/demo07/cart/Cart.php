<?php

namespace lesson04\example02\demo07\cart;

use lesson04\example02\demo07\cart\storage\StorageInterface;

class Cart
{
    /** @var CartItem[] */
    private $items;

    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getItems()
    {
        $this->loadItems();
        return $this->items;
    }

    public function add($id, $count, $price)
    {
        $this->loadItems();
        $current = isset($this->items[$id]) ? $this->items[$id]->getCount() : 0;
        $this->items[$id] = new CartItem($id, $current + $count, $price);
        $this->saveItems();
    }

    public function remove($id)
    {
        $this->loadItems();
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $this->loadItems();
    }

    public function clear()
    {
        $this->items = [];
        $this->saveItems();
    }

    public function getCost()
    {
        $this->loadItems();
        $cost = 0;
        foreach ($this->items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }

    private function loadItems()
    {
        if ($this->items === null) {
            $this->items = $this->storage->load();
        }
    }

    private function saveItems()
    {
        $this->storage->save($this->items);
    }
} 