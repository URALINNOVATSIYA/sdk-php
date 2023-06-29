<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\PhoneCheck\PhoneCheckRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = ['phones' => ["2348028312973"]];

$response = $messaging->phoneCheck(new PhoneCheckRequest($data));

print_r($response->toNestedArray());
