<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\UpdateBandwidthListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$companyId = '';
$data = [];
//$companyId = 306;
//$data = [
//    'bandwidthList' => [
//        ['bandwidth' => 0.9],
//        ['bandwidth' => 0.9, 'channel' => 'VIBER'],
//        ['bandwidth' => 0.9, 'provider' => 'MTS'],
//        ['bandwidth' => 0.3, 'channel' => 'SMS', 'provider' => 'VONAGE']
//    ]
//];

$response = $messaging->updateBandwidthList($companyId, new UpdateBandwidthListRequest($data));

print_r($response->toNestedArray());
