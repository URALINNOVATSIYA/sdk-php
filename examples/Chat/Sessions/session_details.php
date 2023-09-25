<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\SessionDetailsRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$sessionId = '';
$data = [];

$response = $chat->getSessionDetails($sessionId, new SessionDetailsRequest($data));

print_r($response->toNestedArray());
