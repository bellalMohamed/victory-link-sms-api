<?php

namespace Bellal\VictoryLinkSMS\Interfaces;

interface Message {
    public function send(array $data);
}
