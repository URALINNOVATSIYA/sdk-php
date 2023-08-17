<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Bots\CopyBotRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
//$data = [
//    ''
//];
$botId = '';

$response = $bot->copyBot($botId, new CopyBotRequest($data));

print_r($response->toNestedArray());