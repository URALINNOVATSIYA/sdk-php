<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogDebugInfoRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$dialogId = '';
$data = [];

$response = $bot->getDialogDebugInfo($dialogId, new DialogDebugInfoRequest($data));

print_r($response->toNestedArray());
