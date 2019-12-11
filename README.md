Victory Link Bulk SMS API

```
<?php

use Bellal\VictoryLinkSMS\VictoryLinkAdapter;

$message = new VictoryLinkAdapter([
    'username' => 'YOUR_USERNAME',
    'password' => 'YOUR_PASSWORD',
    'sender' => 'YOUR_SENDER',
    'language' => 'MESSAGE LANGUAGE ex: e',
]);

$data = $message->send([
    'to' => '+201111111111',
    'message' => "Your Message Goes Here",
]);
```
