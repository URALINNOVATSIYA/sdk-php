<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Messages\SessionMessageListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$sessionId = '';
$data = [];

$response = $chat->getSessionMessageList($sessionId, new SessionMessageListRequest($data));

print_r($response->toNestedArray());