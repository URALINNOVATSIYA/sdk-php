<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatSaveRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];
//$data = [
//    "name" => "Name",
//    "botId" => "",
//    "operatorsBusyMessage" => "Please, wait...!"
//];
$chatId = '';

$response = $chat->updateChat($chatId, new ChatSaveRequest($data));

print_r($response->toNestedArray());
