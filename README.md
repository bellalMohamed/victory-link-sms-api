Victory Link Bulk SMS API


# Installing Package

The recommended way to install is through
[Composer](https://getcomposer.org/).

```bash
composer require bellal/victory-link-sms
```

# How to use

```php
<?php

use Bellal\VictoryLinkSMS\VictoryLinkAdapter;

$message = new VictoryLinkAdapter([
    'username' => 'YOUR_USERNAME',
    'password' => 'YOUR_PASSWORD',
    'sender' => 'YOUR_SENDER',
    'language' => 'MESSAGE LANGUAGE ex: e',
]);

$message->send([
    'to' => '+201111111111',
    'message' => "Your Message Goes Here",
]);
```

### Get response message
```php
$message->response()->getMessage();
```

### Get response code
```php
$message->response()->getCode();
```
