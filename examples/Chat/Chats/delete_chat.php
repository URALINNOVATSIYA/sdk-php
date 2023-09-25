<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$chatId = '';

$response = $chat->deleteChat($chatId);

print_r($response->toNestedArray());
