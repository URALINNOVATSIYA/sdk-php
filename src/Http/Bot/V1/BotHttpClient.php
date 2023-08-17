<?php

namespace Twin\Sdk\Http\Bot\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\Bot\V1\Request\Bots\CopyBotRequest;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotDetailsRequest;
use Twin\Sdk\Http\Bot\V1\Request\Bots\BotListRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\DialogDebugInfoRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\StartDialogRequest;
use Twin\Sdk\Http\Bot\V1\Request\Dialogs\SendMessageRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\DeleteFactRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\FactListRequest;
use Twin\Sdk\Http\Bot\V1\Request\Facts\SaveFactRequest;
use Twin\Sdk\Http\Bot\V1\Response\Bots\CopyBotResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\DeleteBotResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotDetailsResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\BotListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Bots\RecoverBotResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogDebugInfoResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\FinishDialogResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\ReloadDialogResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\StartDialogResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\DialogVariableListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Dialogs\SendMessageResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\DeleteFactResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\FactListResponse;
use Twin\Sdk\Http\Bot\V1\Response\Facts\SaveFactResponse;
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

    public function deleteBot(string $botId): DeleteBotResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "bots/$botId",
            DeleteBotResponse::class,
            true
        );
    }

    public function recoverBot(string $botId): RecoverBotResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "bots/$botId/recover",
            RecoverBotResponse::class,
            true
        );
    }

    public function copyBot(string $botId, CopyBotRequest $request): CopyBotResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "bots/$botId/copy",
            CopyBotResponse::class,
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

    public function saveFact(SaveFactRequest $request): SaveFactResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            'facts',
            SaveFactResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function deleteFact(string $factId, DeleteFactRequest $request): DeleteFactResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "facts/$factId",
            DeleteFactResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function startDialog(StartDialogRequest $request): StartDialogResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs",
            StartDialogResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function sendMessage(string $dialogId, SendMessageRequest $request): SendMessageResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId",
            SendMessageResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function finishDialog(string $dialogId): FinishDialogResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId/finish",
            FinishDialogResponse::class,
            true
        );
    }

    public function reloadDialog(string $dialogId, string $botID): ReloadDialogResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "dialogs/$dialogId/reload",
            ReloadDialogResponse::class,
            true,
            [
                'botId' => $botID
            ]
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