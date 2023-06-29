<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\BandwidthListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
// $data = ['companyId' => 306, 'channel' => 'SMS', 'provider' => 'VONAGE'];

$response = $messaging->getBandwidthList(new BandwidthListRequest($data));

print_r($response->toNestedArray());
