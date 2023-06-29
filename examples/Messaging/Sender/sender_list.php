<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Sender\SenderListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = ['companyId' => 306];

$response = $messaging->getSenderList(new SenderListRequest($data));

print_r($response->toNestedArray());
