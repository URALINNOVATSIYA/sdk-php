<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Sender\UpdateSenderRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'senders' => [
//        ['from'=> '34','price'=> 1, 'provider'=> 'VONAGE', 'channel'=> ''],
//        ['from'=> '06','price'=> '2.3', 'provider'=> 'MTS']
//    ],
//    'companyId' => 306
//];

$response = $messaging->updateSender(new UpdateSenderRequest($data));

print_r($response->toNestedArray());
