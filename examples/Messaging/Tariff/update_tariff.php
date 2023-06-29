<?php

use Twin\Sdk\Http\Messaging\V1\MessagingHttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Tariff\UpdateTariffRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$messaging = new MessagingHttpClient($authenticator);

$data = [];
//$data = [
//    'companyId' => '1',
//    'tariffs' => [
//        ['mcc_mnc_id' => 1601,'mcc_mnc' => 25041,'iso' =>'ru','country' =>'Russian Federation','network' =>'Gazprom Telecom','price' => 3]
//    ]
//];

$response = $messaging->updateTariff(new UpdateTariffRequest($data));

print_r($response->toNestedArray());
