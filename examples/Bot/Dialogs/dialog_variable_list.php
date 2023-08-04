<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$dialogId = '';

$response = $bot->getDialogVariableList($dialogId);

print_r($response->toNestedArray());
