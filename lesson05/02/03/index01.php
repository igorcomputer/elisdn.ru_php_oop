<?php

namespace lesson05\php\demo02\example03\index01;

use Iterator;

class CsvFileIterator implements Iterator
{
    private $file;
    private $key = 0;
    private $current;

    public function __construct($file) {
        $this->file = fopen($file, 'r');
    }

    public function __destruct() {
        fclose($this->file);
    }

    public function rewind() {
        rewind($this->file);
        $this->current = fgetcsv($this->file);
        $this->key = 0;
    }

    public function valid() {
        return !feof($this->file);
    }

    public function key() {
        return $this->key;
    }

    public function current() {
        return explode(';', $this->current[0]);
    }

    public function next() {
        $this->current = fgetcsv($this->file);
        $this->key++;
    }
}

$iterator = new CsvFileIterator(__DIR__ . '/list.csv');

foreach ($iterator as $row) {
    print_r($row);
}