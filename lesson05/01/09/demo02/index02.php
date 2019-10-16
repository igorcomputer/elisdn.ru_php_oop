<?php

namespace lesson05\grasp\example09\demo02\index02;

use Swift_Mailer;
use Swift_Message;
use Swift_SendmailTransport;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');

$mailer = new Swift_Mailer($transport);

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setTo(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setBody('Here is the message itself')
;

$mailer->send($message);