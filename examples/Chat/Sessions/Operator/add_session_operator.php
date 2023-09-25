<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;

$authenticator = require_once __DIR__ . '/../../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$sessionId = '';
$operatorId = '';

$response = $chat->addSessionOperator($sessionId, $operatorId);

print_r($response->toNestedArray());
