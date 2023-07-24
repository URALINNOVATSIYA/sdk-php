<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CreateMessageBulkRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = ['async' => false];

$request = new CreateMessageBulkRequest($data);

//$request->addFile('/message_bulk_template.csv');

$response = $messaging->createMessageBulk($request);

print_r($response->toNestedArray());
