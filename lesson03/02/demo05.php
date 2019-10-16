<?php

namespace lesson03\example2\demo04;

class Loader
{
    protected function load($url) {
        return file_get_contents($url);
    }
}

class Parser extends Loader
{
    public function getPage($url) {
        return $this->load($url);
    }
}

class Exchanger extends Loader
{
    public function getRate($currency) {
        return $this->load('...?id=' . $currency);
    }
}


$parser = new Parser();
$parser->getPage('...');

$exchanger = new Exchanger();
$exchanger->getRate('USD');

