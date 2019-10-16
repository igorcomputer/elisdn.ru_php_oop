<?php

namespace lesson05\grasp\example09\demo02\index03;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

require_once __DIR__ . '/vendor/autoload.php';

#############################################

$transport = Swift_SmtpTransport::newInstance('smtp.yandex.ru', 443, 'tls')
    ->setUsername('username@ya.ru')
    ->setPassword('password')
;

$mailer = new Swift_Mailer($transport);

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setTo(['mail@elisdn.ru' => 'Dmitry Eliseev'])
    ->setBody('Here is the message itself')
;

$mailer->send($message);