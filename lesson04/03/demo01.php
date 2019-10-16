<?php

namespace lesson04\example03\demo01;

use SoapClient;

class SmsSender
{
    private $client;

    public function __construct() {
        $this->client = new SoapClient('http://api.megafon.ru/api/api.wsdl');
    }

    public function send($phone, $text) {
        return $this->client->SendMessage(['phone' => $phone, 'text' => $text]);
    }
}

$base = new SmsSender();
$base->send('+790000000', 'Привет!');