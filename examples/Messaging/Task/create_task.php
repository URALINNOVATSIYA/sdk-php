<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Task\CreateTaskRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'name' => 'task sdk new test',
//    'allowedTimeRanges' => [['00:00:00', '03:59:59'], ['06:00:00', '13:59:59']]
//];

$response = $messaging->createTask(new CreateTaskRequest($data));

print_r($response->toNestedArray());
