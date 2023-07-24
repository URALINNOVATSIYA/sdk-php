<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\WhiteList\UpdateWhiteListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$companyId = '';
$data = [];
//$companyId = 306;
//$data = [
//    'items' => [
//        ['provider'=> 'INFOBIP', 'channel'=> 'SMS', 'entity'=> 'sdk', 'values'=> ['Hello World', 'Test Message']],
//        ['provider'=> 'VONAGE', 'channel'=> 'SMS', 'entity'=> 'sdk 2']
//    ]
//];

$response = $messaging->updateWhiteList($companyId, new UpdateWhiteListRequest($data));

print_r($response->toNestedArray());
