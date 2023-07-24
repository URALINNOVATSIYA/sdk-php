<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Task\UpdateTaskRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$taskId = '';
$data = [];
//$taskId = 'e9065cc7-5251-4937-8083-b1a2bff21843';
//$data = [
//    'name' => 'sdk test upd',
//    'allowedTimeRanges' => [['03:00:00', '03:59:59'], ['12:00:00', '19:59:59']]
//];

$response = $messaging->updateTask(new UpdateTaskRequest($data), $taskId);

print_r($response->toNestedArray());
