<?php

namespace lesson04\example02\demo08\tests\storage;

use lesson04\example02\demo08\cart\CartItem;
use lesson04\example02\demo08\cart\storage\SessionStorage;

class SessionStorageTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $storage = new SessionStorage('cart');
        $this->assertEquals([], $storage->load());
    }

    public function testStore()
    {
        $storage = new SessionStorage('cart');

        $storage->save([5 => new CartItem(5, 11, 200)]);

        $this->assertEquals(1, count($items = $storage->load()));
        $this->assertNotNull($items[5]);
        $this->assertEquals(5, $items[5]->getId());
        $this->assertEquals(11, $items[5]->getCount());
        $this->assertEquals(200, $items[5]->getPrice());
    }
} 