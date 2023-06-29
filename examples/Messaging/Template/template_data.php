<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$templateId = '';
//$templateId = 'f89d8e3f-0a0d-4205-98ed-f79009c934da';

$response = $messaging->getTemplateData($templateId);

print_r($response->toNestedArray());
