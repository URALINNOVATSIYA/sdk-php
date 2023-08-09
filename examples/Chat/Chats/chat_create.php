<?php

use Twin\Sdk\Http\Chat\V1\ChatHttpClient;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatSaveRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$chat = new ChatHttpClient($authenticator);

$data = [];
//$data = [
//    "name" => "Test net chat",
//	"botId" => "",
//	"operatorsBusyMessage" => "Please, wait...!",
//	"appearance" => ["buttonStyle" => ["background-color"  => "#FFA200"] ],
//	"messengers" => ["ALICE" => ["authToken" => ""]],
//	"fcmServerKey" => "",
//	"pushData" => ["value" => "net chat", "action" => "net profile"],
//	"references" => ["WHATSAPP" => "https://www.whatsapp.com/testtest"],
//    "results"  => ["sdsd"]
//];

$response = $chat->createChat(new ChatSaveRequest($data));

print_r($response->toNestedArray());
