<?php

namespace lesson04\example02\demo05\cart;

use Yii;

class YiiCart extends Cart
{
    public $sessionKey = 'cart';

    protected function loadItems()
    {
        if ($this->items === null) {
            $this->items = Yii::$app->session->get($this->sessionKey, []);
        }
    }

    protected function saveItems()
    {
        Yii::$app->session->set($this->sessionKey, $this->items);
    }
} 