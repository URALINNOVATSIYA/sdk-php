<?php

namespace Twin\Sdk\Http\Chat\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatDetailsRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatListRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\CreateChatRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\UpdateChatRequest;
use Twin\Sdk\Http\Chat\V1\Response\Chats\CreateChatResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatDetailsResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatListResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\UpdateChatResponse;
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

    public function createChat(CreateChatRequest $request): CreateChatResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "chats",
            CreateChatResponse::class,
            true,
            $request->toArray(true)
        );

    }

    public function updateChat(string $chatId, UpdateChatRequest $request): UpdateChatResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "chats/$chatId",
            UpdateChatResponse::class,
            true,
            $request->toArray(true)
        );
    }
}