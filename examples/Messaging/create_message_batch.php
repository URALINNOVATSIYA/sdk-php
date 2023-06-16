<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\CreateMessageBatchRequest;

$authenticator = require_once __DIR__ . '/../authentication.php';

$iam = new MessagingHttpClient($authenticator);
$response = $iam->createMessageBatch(new CreateMessageBatchRequest());

print_r($response->toNestedArray());
