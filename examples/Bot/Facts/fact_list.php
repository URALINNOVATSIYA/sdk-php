<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];

$response = $bot->getFactList(new FactListRequest($data));

print_r($response->toNestedArray());
