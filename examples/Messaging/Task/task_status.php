<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$taskId = '';
//$taskId = 'e947a610-a015-4fc3-9e2a-5f48a777eafd';

$response = $messaging->taskStatus($taskId);

print_r($response->toNestedArray());
