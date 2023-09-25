<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Messages\CreateOperatorChatMessageRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$sessionId = '';
$data = [
    'body' => ''
];

$response = $chat->createOperatorChatMessage($sessionId, new CreateOperatorChatMessageRequest($data));

print_r($response->toNestedArray());