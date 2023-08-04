<?php

use Twin\Sdk\Http\Bot\V1\BotHttpClient;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogReloadRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$bot = new BotHttpClient($authenticator);

$data = [];
$dialogId = '';

$response = $bot->reloadDialog($dialogId, new DialogReloadRequest($data));

print_r($response->toNestedArray());
