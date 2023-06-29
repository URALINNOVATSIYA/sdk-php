<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Tariff\TariffListRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'iso' => 'ru',
//    'network' => 'Gazprom Telecom',
//    'companyId' => 1
//];

$response = $messaging->getTariffList(new TariffListRequest($data));

print_r($response->toNestedArray());
