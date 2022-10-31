<?php

use Twin\Http\IAM\V1\IamHttpClient;

$authenticator = require_once __DIR__ . '/../authentication.php';

$iam = new IamHttpClient($authenticator);
$response = $iam->getUserSettingDefinitions();

print_r($response->toNestedArray());