<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Template\CreateTemplateRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'name' => 'template sdk test',
//    'channels' => [
//        'sms' => ['text' => 'sdk test', 'from' => 'Twin24', 'provider' => 'INFOBIP']
//    ],
//    'allowedTimeRanges' => [['00:00:00', '03:59:59'], ['06:00:00', '13:59:59']]
//];

$response = $messaging->createTemplate(new CreateTemplateRequest($data));

print_r($response->toNestedArray());
