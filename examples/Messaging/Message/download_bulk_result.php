<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$resultId = '';
//$resultId = "367fd405-f32f-4bcb-9368-b366099287bb";

$response = $messaging->downloadBulkResult($resultId);

print_r($response->toNestedArray());
