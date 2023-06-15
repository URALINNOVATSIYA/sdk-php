<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\TaskListRequest;

$authenticator = require_once __DIR__ . '/../authentication.php';

$iam = new MessagingHttpClient($authenticator);

$response = $iam->getTaskList(new TaskListRequest([]));

print_r($response->toNestedArray());