<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Template\UpdateTemplateRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$templateId = '';
$data = [];
//$templateId = 'f89d8e3f-0a0d-4205-98ed-f79009c934da';
//$data = [
//    'name' => 'template sdk UPD',
//    'channels' => [
//        'sms' => [
//            'text' => 'sdk test upd',
//            'from' => 'Twin24',
//            'provider' => 'RAPPORTO',
//            'validityPeriod' => 10,
//        ]
//    ],
//    'allowedTimeRanges' => [['12:00:00', '12:00:59'], ['19:00:00', '19:59:59']]
//];

$response = $messaging->updateTemplate(new UpdateTemplateRequest($data), $templateId);

print_r($response->toNestedArray());
