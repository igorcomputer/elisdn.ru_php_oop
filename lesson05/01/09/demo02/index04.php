<?php

namespace lesson05\grasp\example09\demo02\index04;

use Swift_Events_EventListener;
use Swift_Mailer;
use Swift_Message;
use Swift_Mime_Message;
use Swift_Transport;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

class EchoTransport implements Swift_Transport
{
    public function isStarted() { return true; }
    public function start() { }
    public function stop() { }

    public function send(Swift_Mime_Message $message, &$failedRecipients = null) {
        echo 'Send: ' . $message->getSubject() . PHP_EOL;
        return 1;
    }

    public function registerPlugin(Swift_Events_EventListener $plugin) { }
}

$mailer = new Swift_Mailer(new EchoTransport());

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setTo(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setBody('Here is the message itself')
;

$mailer->send($message);