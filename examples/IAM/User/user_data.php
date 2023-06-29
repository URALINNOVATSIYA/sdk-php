<?php

use Twin\Sdk\Http\IAM\V1\IamHttpClient;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$iam = new IamHttpClient($authenticator);

$userId = null;

$response = $iam->getUserData($userId);

print_r($response->toNestedArray());
