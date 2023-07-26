<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotDetailsRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
$botId = null;

$response = $bot->getBotDetails($botId, new BotDetailsRequest($data));

print_r($response->toNestedArray());
