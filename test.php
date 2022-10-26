<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$authenticator = \Twin\Http\Authenticator::fromBasic('smilimko@gmail.com', 'Tesserakt0');

$iam = new \Twin\Http\IAM\IamHttpClient($authenticator);
$iam->throwExceptionOnRequestError(false);
//$iam->async(true);

$response = $iam->downloadFile('1189cd6a-8050-4eb6-9302-1566d7cdef00');
$response->toFile(__DIR__ . '/test.png');
//$response = $promise->wait();

//print_r($response->toFile(__DIR__ . '/test.png'));