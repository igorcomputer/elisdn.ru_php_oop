<?php

namespace lesson03\example2\demo06;

class Loader
{
    public function load($url) {
        return file_get_contents($url);
    }
}

class Parser
{
    public function getPage($url) {
        $loader = new Loader();
        return $loader->load($url);
    }
}

class Exchanger
{
    public function getRate($currency) {
        $loader = new Loader();
        return $loader->load('...?id=' . $currency);
    }
}

$parser = new Parser();
$parser->getPage('...');

$exchanger = new Exchanger();
$exchanger->getRate('USD');

