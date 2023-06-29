<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Template\TemplateListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'id' => '275c5e12-6fef-46e4-8f1d-ffe7cf656a18',
//];

$response = $messaging->getTemplateList(new TemplateListRequest($data));

print_r($response->toNestedArray());
