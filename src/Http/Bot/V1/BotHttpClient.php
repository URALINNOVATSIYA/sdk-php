<?php

namespace Twin\Sdk\Http\Bot\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotDetailsRequest;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotListRequest;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotDetailsResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotListResponse;
use Twin\Sdk\Http\HttpClient;

class BotHttpClient extends HttpClient
{
    public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct('https://bot.dev.twin24.ai/api/v1', $authenticator, $client);
    }

    public function getBotList(BotListRequest $request): BotListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'bots',
            BotListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getBotDetails(mixed $botId, BotDetailsRequest $request)
    {
        return $this->request(
            'GET',
            "bots/$botId",
            BotDetailsResponse::class,
            true,
            $request->toArray(true)
        );
    }
}