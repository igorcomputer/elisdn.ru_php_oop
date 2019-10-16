<?php

namespace lesson03\example2\demo07;

class Loader
{
    public function load($url) {
        return file_get_contents($url);
    }
}

class Parser
{
    private $loader;

    public function __construct(Loader $loader) {
        $this->loader = $loader;
    }

    public function getPage($url) {
        return $this->loader->load($url);
    }
}

class Exchanger
{
    private $loader;

    public function __construct(Loader $loader) {
        $this->loader = $loader;
    }

    public function getRate($currency) {
        return $this->loader->load('...?id=' . $currency);
    }
}

class SuperLoader extends Loader
{
    public function load($url) {
        return '<html>123</html>';
    }
}

if (TEST) {
    $loader = new SuperLoader();
} else {
    $loader = new Loader();
}

$parser = new Parser($loader);
$parser->getPage('...');

$exchanger = new Exchanger($loader);
$exchanger->getRate('USD');

