<?php

namespace lesson04\example02\demo08\cart\storage;

use lesson04\example02\demo08\cart\CartItem;

interface StorageInterface
{
    /**
     * @return CartItem[]
     */
    public function load();

    /**
     * @param CartItem[] $items
     */
    public function save(array $items);
}