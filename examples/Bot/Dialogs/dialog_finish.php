<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$bot->testOn();

$dialogId = '0dcd0bd9-300d-4796-a817-2ff46cb079ae';

$response = $bot->finishDialog($dialogId);

print_r($response->toNestedArray());
