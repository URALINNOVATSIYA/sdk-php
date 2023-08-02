<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotCopyRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
$botId = '';

$response = $bot->copyBot($botId, new BotCopyRequest($data));

print_r($response->toNestedArray());