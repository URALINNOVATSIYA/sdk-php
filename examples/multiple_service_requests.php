<?php

use GuzzleHttp\Promise\Utils;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotDetailsRequest;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotDetailsResponse;
use Twin\Sdk\Http\IAM\V1\Request\UserListRequest;
use Twin\Sdk\Http\IAM\V1\Response\User\UserListResponse;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\MessageListRequest;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\MessageListResponse;
use Twin\Sdk\Http\TwinHttpClient;

$authenticator = require_once __DIR__ . '/authentication.php';

$client = new TwinHttpClient($authenticator);

$promises = [];

$client->asyncOn(); // now all requests will be asynchronously performed

$promises['userList'] = $client->iam->getUserList(new UserListRequest());
$promises['messageList'] = $client->messaging->getMessageList(new MessageListRequest());
$promises['botDetails'] = $client->bot->getBotDetails('', new BotDetailsRequest());

$client->asyncOff(); // turn off async request sending

// Wait for the requests to complete, even if some of them fail.
$responses = Utils::settle($promises)->wait();

// Wait for the requests to complete until any of the requests fail.
// $responses = Utils::unwrap($promises);

/** @var UserListResponse $userListResponse */
$userListResponse = $responses['userList']['value'];
print_r($userListResponse->body->toNestedArray());

/** @var MessageListResponse $messageListResponse */
$messageListResponse = $responses['messageList']['value'];
print_r($messageListResponse->body->toNestedArray());

/** @var BotDetailsResponse $botDetailsResponse */
$botDetailsResponse = $responses['botDetails']['value'];
print_r($botDetailsResponse->body->toNestedArray());