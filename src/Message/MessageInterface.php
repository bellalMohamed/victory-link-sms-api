<?php

namespace Bellal\VictoryLinkSMS\Message;

interface MessageInterface {
    public function send(array $data);
}
