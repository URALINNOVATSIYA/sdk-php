<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$messageId = '';

$response = $chat->markMessageAsRead($messageId);

print_r($response->toNestedArray());