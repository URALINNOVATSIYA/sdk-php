<?php

use Twin\Sdk\Http\IAM\V1\IamHttpClient;

$authenticator = require_once __DIR__ . '/../authentication.php';

$iam = new IamHttpClient($authenticator);
$response = $iam->getUserData(70);

print_r($response->toNestedArray());