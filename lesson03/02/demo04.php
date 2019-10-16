<?php

namespace lesson03\example2\demo03;

class Parser
{
    public function getPage($url) {
        return $this->load($url);
    }

    private function load($url) {
        return file_get_contents($url);
    }
}

class Exchanger
{
    public function getRate($currency) {
        return $this->load('...?id=' . $currency);
    }

    private function load($url) {
        return file_get_contents($url);
    }
}

$parser = new Parser();
$parser->getPage('...');

$exchanger = new Exchanger();
$exchanger->getRate('USD');

