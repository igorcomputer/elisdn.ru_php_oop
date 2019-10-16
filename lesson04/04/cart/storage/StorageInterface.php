<?php

namespace lesson04\example04\cart\storage;

use lesson04\example02\demo09\cart\CartItem;

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