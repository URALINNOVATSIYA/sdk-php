<?php

namespace Twin\Sdk\Http\Bot\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotCopyRequest;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotDetailsRequest;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotListRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogDebugInfoRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogReloadRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogStartRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\MessageSendRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactDeleteRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactListRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactSaveRequest;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotCopyResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotDeleteResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotDetailsResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotRecoverResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogDebugInfoResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogFinishResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogReloadResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogStartResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogVariableListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\MessageSendResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\FactDeleteResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\FactListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\FactSaveResponse;
use Twin\Sdk\Http\HttpClient;

class BotHttpClient extends HttpClient
{
    final public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct(
            'https://bot.twin24.ai/api/v1',
            'https://bot.dev.twin24.ai/api/v1',
            $authenticator,
            $client,
        );
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

    public function getBotDetails(string $botId, BotDetailsRequest $request): BotDetailsResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "bots/$botId",
            BotDetailsResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function deleteBot(string $botId): BotDeleteResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "bots/$botId",
            BotDeleteResponse::class,
            true
        );
    }

    public function recoverBot(string $botId): BotRecoverResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "bots/$botId/recover",
            BotRecoverResponse::class,
            true
        );
    }

    public function copyBot(string $botId, BotCopyRequest $request): BotCopyResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "bots/$botId/copy",
            BotCopyResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getFactList(FactListRequest $request): FactListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'facts',
            FactListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function saveFact(FactSaveRequest $request): FactSaveResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            'facts',
            FactSaveResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function deleteFact(string $factId, FactDeleteRequest $request): FactDeleteResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "facts/$factId",
            FactDeleteResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function startDialog(DialogStartRequest $request): DialogStartResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs",
            DialogStartResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function sendMessage(string $dialogId, MessageSendRequest $request): MessageSendResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId",
            MessageSendResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function finishDialog(string $dialogId): DialogFinishResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId/finish",
            DialogFinishResponse::class,
            true
        );
    }

    public function reloadDialog(string $dialogId, DialogReloadRequest $request): DialogReloadResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId/reload",
            DialogReloadResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getDialogVariableList(string $dialogId): DialogVariableListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "dialogs/$dialogId/variableList",
            DialogVariableListResponse::class,
            true
        );
    }

    public function getDialogDebugInfo(
        string $dialogId,
        DialogDebugInfoRequest $request
    ): DialogDebugInfoResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "dialogs/$dialogId/debugInfo",
            DialogDebugInfoResponse::class,
            true,
            $request->toArray(true)
        );
    }
}