<?php

use Bellal\VictoryLinkSMS\VictoryLink;

require 'vendor/autoload.php';

$message = new VictoryLink([
    'username' => 'YOUR_USERNAME',
    'password' => 'YOUR_PASSWORD',
    'sender' => 'YOUR_SENDER',
    'language' => 'MESSAGE LANGUAGE ex: e',
]);

$response = $message->send([
    'to' => '01111111111',
    'message' => "Your Message Goes Here",
]);
