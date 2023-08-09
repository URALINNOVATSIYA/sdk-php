<?php

namespace Twin\Sdk\Http\Chat\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatDetailsRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatListRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatSaveRequest;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatCreateResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatDetailsResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatListResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatUpdateResponse;
use Twin\Sdk\Http\HttpClient;

class ChatHttpClient extends HttpClient
{
    final public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct(
            'https://chat-api.twin24.ai/api/v1',
            'https://chats-api.dev.twin24.ai/api/v1',
            $authenticator,
            $client,
        );
    }

    public function getChatList(ChatListRequest $request): ChatListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "chats",
            ChatListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getChatDetails(string $chatId, ChatDetailsRequest $request): ChatDetailsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "chats/$chatId",
            ChatDetailsResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function createChat(ChatSaveRequest $request): ChatCreateResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "chats",
            ChatCreateResponse::class,
            true,
            $request->toArray(true)
        );

    }

    public function updateChat(string $chatId, ChatSaveRequest $request): ChatUpdateResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "chats/$chatId",
            ChatUpdateResponse::class,
            true,
            $request->toArray(true)
        );
    }
}