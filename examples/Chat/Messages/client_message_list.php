<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Messages\ClientMessageListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$clientId = '';
$data = [];

$response = $chat->getClientMessageList($clientId, new ClientMessageListRequest($data));

print_r($response->toNestedArray());