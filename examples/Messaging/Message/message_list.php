<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\MessageListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = ['id' => '389392e2-76fc-4249-b9fd-e54d584b4b5d'];

$response = $messaging->getMessageList(new MessageListRequest($data));

print_r($response->toNestedArray());
