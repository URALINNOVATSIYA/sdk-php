<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CancelMessageSendingRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'id' => "0d2dc525-a617-4db0-8fca-a9e13be91b77"
//];

$response = $messaging->cancelMessage(new CancelMessageSendingRequest($data));

print_r($response->toNestedArray());
