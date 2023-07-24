<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CreateMessageBatchRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    "messages" => [
//        [
//            'destinations' => [['phone' => '']],
//            'channels' => [
//                'sms' => [
//                    'from' => 'TwinService',
//                    'text' => 'sdk test',
//                    'provider' => 'INFOBIP',
//                ]
//            ],
//            'groupId' => 'cba25116-a741-4447-8c12-9251d577ad3f',
//            'templateId' => 'e95dcf36-bf39-430e-876d-061f954460cb',
//            'callbackUrl' => 'local',
//            'callbackData' => 'callbackData',
//            'useShortLinks' => false,
//            'validate' => false,
//            'allowedTimeRanges' => [['00:00:00', '03:59:59'], ['06:00:00', '13:59:59']]
//        ]
//    ]
//];

$response = $messaging->createMessageBatch(new CreateMessageBatchRequest($data));

print_r($response->toNestedArray());
