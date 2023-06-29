<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\ShortLink\ShortLinkListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = ['messageId' => 'e537dd5d-edcb-45c2-ad9e-c0efc70f52ad'];

$response = $messaging->getShortLinkList(new ShortLinkListRequest($data));

print_r($response->toNestedArray());
