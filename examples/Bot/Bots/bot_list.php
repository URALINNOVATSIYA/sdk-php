<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];

$response = $bot->getBotList(new BotListRequest($data));

var_dump($response->toNestedArray());
