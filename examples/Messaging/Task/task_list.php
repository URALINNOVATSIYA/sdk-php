<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Task\TaskListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'name' => 'sdk test upd'
//];

$response = $messaging->getTaskList(new TaskListRequest($data));

print_r($response->toNestedArray());
