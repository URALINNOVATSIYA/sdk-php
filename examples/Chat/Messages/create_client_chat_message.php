<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Messages\CreateClientChatMessageRequest;
$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$sessionId = '';
$data = [
    'body' => ''
];

$response = $chat->createClientChatMessage($sessionId, new CreateClientChatMessageRequest($data));

print_r($response->toNestedArray());