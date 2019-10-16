<?php

namespace lesson04\example03\demo04;

use SoapClient;

class DummyClient extends SoapClient
{
    public function __construct() {
        parent::SoapClient(null);
    }

    public function SendMessage($params) {
        return true;
    }
}

class SmsSender
{
    private $client;

    public function __construct(SoapClient $client) {
        $this->client = $client;
    }

    public function send($phone, $text) {
        return $this->client->SendMessage(['phone' => $phone, 'text' => $text]);
    }
}

$client = new SoapClient('http://api.megafon.ru/api/api.wsdl');
$base = new SmsSender($client);
$base->send('+790000000', 'Привет!');

$client = new SoapClient('http://localhost/api/api.wsdl');
$base = new SmsSender($client);
$base->send('+790000000', 'Привет!');

$client = new DummyClient();
$base = new SmsSender($client);
$base->send('+790000000', 'Привет!');