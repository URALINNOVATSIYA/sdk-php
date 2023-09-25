<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\SessionListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];

$response = $chat->getSessionList(new SessionListRequest($data));

print_r($response->toNestedArray());
