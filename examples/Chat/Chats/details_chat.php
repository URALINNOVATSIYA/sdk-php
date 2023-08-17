<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatDetailsRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];
$chatId = '';

$response = $chat->getChatDetails($chatId, new ChatDetailsRequest($data));

print_r($response->toNestedArray());
