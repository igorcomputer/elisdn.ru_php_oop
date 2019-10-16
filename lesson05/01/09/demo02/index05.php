<?php

namespace lesson05\grasp\example09\demo02\index05;

use Swift_Events_EventListener;
use Swift_Mailer;
use Swift_MailTransport;
use Swift_Message;
use Swift_Mime_Message;
use Swift_NullTransport;
use Swift_Plugins_MessageLogger;
use Swift_Transport;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$mailer = new Swift_Mailer(Swift_NullTransport::newInstance());

$loggerPlugin = new Swift_Plugins_MessageLogger();

$mailer->registerPlugin($loggerPlugin);

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setTo(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setBody('Here is the message itself')
;

$mailer->send($message);

echo $loggerPlugin->countMessages() . PHP_EOL;