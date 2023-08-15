<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\SendMessageRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
//$data = [
//    "message" =>  '08:34:05',
//    "attachments" => [],
//	"returnAnswerAsync"=> false,
//	"callbackUrl"=> null,
//	"callbackData"=> null
//];
$dialogId = '';

$response = $bot->sendMessage($dialogId, new SendMessageRequest($data));

print_r($response->toNestedArray());
