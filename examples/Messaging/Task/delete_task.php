<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$taskId = '';
//$taskId = 'f8e064ac-dd10-42ab-8212-f9b9cb64c300';

$response = $messaging->deleteTask($taskId);

print_r($response->toNestedArray());
