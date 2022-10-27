<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$authenticator = \Twin\Http\Authenticator::fromBasic('smilimko@gmail.com', 'Tesserakt0');

$iam = new \Twin\Http\IAM\V1\IamHttpClient($authenticator);
$iam->throwExceptionOnRequestError(false);
//$iam->async(true);

$response = $iam->getUserList(new \Twin\Http\IAM\V1\Request\UserListRequest());
//$response = $promise->wait();

print_r($response->toNestedArray());