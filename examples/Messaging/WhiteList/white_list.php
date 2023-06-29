<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\WhiteList\WhiteListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
// $data = ['companyId' => 306, 'channel' => 'SMS', 'provider' => 'VONAGE', 'entity' => 'sdk test'];

$response = $messaging->getWhiteList(new WhiteListRequest($data));

print_r($response->toNestedArray());
