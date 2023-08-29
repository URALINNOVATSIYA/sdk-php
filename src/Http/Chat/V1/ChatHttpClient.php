<?php

namespace Twin\Sdk\Http\Chat\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Chat\V1\Request\Chats\ChatListRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\CreateChatRequest;
use Twin\Sdk\Http\Chat\V1\Request\Chats\UpdateChatRequest;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\DeleteSessionRequest;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\SessionDetailsRequest;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\SessionListRequest;
use Twin\Sdk\Http\Chat\V1\Request\Sessions\StartChatSessionRequest;
use Twin\Sdk\Http\Chat\V1\Response\Chats\CreateChatResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatDetailsResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\ChatListResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\DeleteChatResponse;
use Twin\Sdk\Http\Chat\V1\Response\Chats\UpdateChatResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\AddSessionOperatorResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\ContinueChatSessionResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\DeleteSessionOperatorResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\DeleteSessionResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\MarkSessionSpamResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\RenameChatSessionResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\SessionDetailsResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\SessionListResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\StartChatSessionResponse;
use Twin\Sdk\Http\Chat\V1\Response\Sessions\SwitchSessionOperatorResponse;
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

    public function getChatDetails(string $chatId): ChatDetailsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "chats/$chatId",
            ChatDetailsResponse::class,
            true
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

    public function deleteChat(string $chatId): DeleteChatResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "chats/$chatId",
            DeleteChatResponse::class,
            true
        );
    }

    public function getSessionList(SessionListRequest $request): SessionListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "sessions",
            SessionListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getSessionDetails(
        string $sessionId,
        SessionDetailsRequest $request
    ): SessionDetailsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "sessions/$sessionId",
            SessionDetailsResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function startChatSession(
        string $chatId,
        StartChatSessionRequest $request
    ): StartChatSessionResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "chats/$chatId/sessions",
            StartChatSessionResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function continueChatSession(
        string $chatId,
        StartChatSessionRequest $request
    ): ContinueChatSessionResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "chats/$chatId/sessions",
            ContinueChatSessionResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function deleteSession(
        string $sessionId,
        DeleteSessionRequest $request
    ): DeleteSessionResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "sessions/$sessionId",
            DeleteSessionResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function renameChatSession(
        string $sessionId,
        string $newSessionName
    ): RenameChatSessionResponse|PromiseInterface
    {
        return $this->request(
            'PATCH',
            "sessions/$sessionId/names/$newSessionName",
            RenameChatSessionResponse::class,
            true
        );
    }

    public function switchSessionOperator(
        string $sessionId,
        string $operatorId
    ): SwitchSessionOperatorResponse|PromiseInterface
    {
        return $this->request(
            'PATCH',
            "sessions/$sessionId/operators/$operatorId",
            SwitchSessionOperatorResponse::class,
            true
        );
    }

    public function addSessionOperator(
        string $sessionId,
        string $operatorId
    ): AddSessionOperatorResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "sessions/$sessionId/operators/$operatorId",
            AddSessionOperatorResponse::class,
            true
        );
    }

    public function deleteSessionOperator(
        string $sessionId,
        string $operatorId
    ): DeleteSessionOperatorResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "sessions/$sessionId/operators/$operatorId",
            DeleteSessionOperatorResponse::class,
            true
        );
    }

    public function switchSessionGroupOperators(
        string $sessionId,
        string $groupId
    ): SwitchSessionOperatorResponse|PromiseInterface
    {
        return $this->request(
            'PATCH',
            "sessions/$sessionId/groupoperators/$groupId",
            SwitchSessionOperatorResponse::class,
            true
        );
    }

    public function markSessionSpam(string $sessionId): MarkSessionSpamResponse|PromiseInterface
    {
        return $this->request(
            'PATCH',
            "sessions/$sessionId/spam",
            MarkSessionSpamResponse::class,
            true
        );
    }

    public function markSessionNotSpam(string $sessionId): MarkSessionSpamResponse|PromiseInterface
    {
        return $this->request(
            'PATCH',
            "sessions/$sessionId/notSpam",
            MarkSessionSpamResponse::class,
            true
        );
    }
}