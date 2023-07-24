<?php

use Twin\Sdk\Http\IAM\V1\IamHttpClient;
use Twin\Sdk\Http\Request\UploadFilesRequest;

$authenticator = require_once __DIR__ . '/../../authentication.php';

$iam = new IamHttpClient($authenticator);

$data = [];
//$data = ['private' => false];

$request  = new UploadFilesRequest($data);
//$request->addFile('https://kartinki.pibig.info/uploads/posts/2023-04/thumbs/1682125181_kartinki-pibig-info-p-utka-mandarinka-kartinka-arti-pinterest-2.jpg');

$response = $iam->uploadFiles($request);

print_r($response->toNestedArray());
