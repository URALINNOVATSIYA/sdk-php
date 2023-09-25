<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\StartChatSessionRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];
//$data = [
//    "name" => "Name"
//];
$chatId = '';

$response = $chat->continueChatSession($chatId, new StartChatSessionRequest($data));

print_r($response->toNestedArray());
