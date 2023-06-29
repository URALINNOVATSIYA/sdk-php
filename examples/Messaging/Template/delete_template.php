<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$templateId = '';
//$templateId = 'f78ad8e5-8ea1-41f5-b70b-554e45a0a810';

$response = $messaging->deleteTemplate($templateId);

print_r($response->toNestedArray());
