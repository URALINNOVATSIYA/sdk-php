<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\StartChatSessionRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];
//$data = [
//    "returnAnswerAsync" => false,
//    "clientNameForOperator" => "Name",
//    "clientExternalId" => "22224545",
//    "message" => "Hi"
//];
$chatId = '';

$response = $chat->startChatSession($chatId, new StartChatSessionRequest($data));

print_r($response->toNestedArray());
