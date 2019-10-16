<?php

namespace lesson05\grasp\example09\demo02\index06;

use Swift_Events_SendEvent;
use Swift_Events_SendListener;
use Swift_Mailer;
use Swift_Message;
use Swift_NullTransport;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$mailer = new Swift_Mailer(new Swift_NullTransport());

#############################################

class EchoPlugin implements Swift_Events_SendListener
{
    public function beforeSendPerformed(Swift_Events_SendEvent $evt) {
        echo 'Before sending: ' . $evt->getMessage()->getSubject() . PHP_EOL;
    }

    public function sendPerformed(Swift_Events_SendEvent $evt) {
        echo 'After sending: ' . $evt->getMessage()->getSubject() . PHP_EOL;
    }
}

$mailer->registerPlugin(new EchoPlugin());

#############################################

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setTo(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setBody('Here is the message itself')
;

$mailer->send($message);