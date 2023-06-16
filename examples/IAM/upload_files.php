<?php

use Twin\Sdk\Http\IAM\V1\IamHttpClient;
use Twin\Sdk\Http\Request\UploadFilesRequest;

$authenticator = require_once __DIR__ . '/../authentication.php';

$iam = new IamHttpClient($authenticator);
$response = $iam->uploadFiles(new UploadFilesRequest());

print_r($response->toNestedArray());
