<?php

use Bellal\VictoryLinkSMS\VictoryLinkAdapter;

require 'vendor/autoload.php';

$message = new VictoryLinkAdapter([
    'username' => 'YOUR_USERNAME',
    'password' => 'YOUR_PASSWORD',
    'sender' => 'YOUR_SENDER',
    'language' => 'MESSAGE LANGUAGE ex: e',
]);

$data = $message->send([
    'to' => '01111111111',
    'message' => "Your Message Goes Here",
]);
