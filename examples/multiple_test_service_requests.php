<?php

use GuzzleHttp\Promise\Utils;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotListRequest;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotListResponse;
use Twin\Sdk\Http\IAM\V1\Response\User\UserDataResponse;
use Twin\Sdk\Http\Messaging\V1\Request\Sender\SenderListRequest;
use Twin\Sdk\Http\Messaging\V1\Response\Sender\SenderListResponse;
use Twin\Sdk\Http\TwinHttpClient;

$authenticator = require_once __DIR__ . '/authentication.php';

$client = new TwinHttpClient($authenticator);

// turn on test mode
$client->testOn();
// disable any request error (for example, timeout errors).
$client->throwExceptionOnRequestError(false);
// turn on async mode to do multiple requests in parallel
$client->asyncOn();
// increase the time of request execution
$client->setConnectionTimeout(10); // by default 5 seconds
$client->setRequestTimeout(300);   // by default 60 seconds

$promises = [];

$promises['userData'] = $client->iam->getUserData(100);
$promises['senderList'] = $client->messaging->getSenderList(new SenderListRequest());
$promises['botList'] = $client->bot->getBotList(new BotListRequest());

$responses = Utils::settle($promises)->wait();

/** @var UserDataResponse $userDataResponse */
$userDataResponse = $responses['userData']['value'];
print_r($userDataResponse->body->toNestedArray());

/** @var SenderListResponse $senderListResponse */
$senderListResponse = $responses['senderList']['value'];
print_r($senderListResponse->body->toNestedArray());

/** @var BotListResponse $botListResponse */
$botListResponse = $responses['botList']['value'];
print_r($botListResponse->body->toNestedArray());