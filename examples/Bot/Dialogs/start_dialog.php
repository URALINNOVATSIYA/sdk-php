<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\StartDialogRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
//$data = [
//    "botId" => "",
//    "message" =>  null,
//	"ttl" => 3600,
//	"communicationType" => "TEXT",
//	"returnAnswerAsync" => false,
//	"callbackUrl" => null
//];

$response = $bot->startDialog(new StartDialogRequest($data));

print_r($response->toNestedArray());
