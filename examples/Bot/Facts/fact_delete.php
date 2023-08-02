<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactDeleteRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$factId = '';
$data = [];

$response = $bot->deleteFact($factId, new FactDeleteRequest($data));

print_r($response->toNestedArray());
