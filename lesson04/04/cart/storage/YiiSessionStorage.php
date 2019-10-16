<?php

namespace lesson04\example04\cart\storage;

use Yii;

class YiiSessionStorage implements StorageInterface
{
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function load()
    {
        return Yii::$app->session->get($this->key, []);
    }

    public function save(array $items)
    {
        Yii::$app->session->set($this->key, $items);
    }
} 