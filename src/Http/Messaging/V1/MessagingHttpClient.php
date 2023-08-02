<?php

namespace Twin\Sdk\Http\Messaging\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\HttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\BandwidthListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\UpdateBandwidthListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\PhoneCheck\PhoneCheckRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CancelMessageSendingRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CreateMessageBatchRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\CreateMessageBulkRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Messaging\MessageListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Sender\SenderListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Sender\UpdateSenderRequest;
use Twin\Sdk\Http\Messaging\V1\Request\ShortLink\ShortLinkListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Tariff\TariffListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Tariff\UpdateTariffRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Task\AddMessageRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Task\CreateTaskRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Task\UpdateTaskRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Task\TaskListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Template\CreateTemplateRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Template\TemplateListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\Template\UpdateTemplateRequest;
use Twin\Sdk\Http\Messaging\V1\Request\WhiteList\UpdateWhiteListRequest;
use Twin\Sdk\Http\Messaging\V1\Request\WhiteList\WhiteListRequest;
use Twin\Sdk\Http\Messaging\V1\Response\PhoneCheck\PhoneCheckResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Entity\Bandwidth\BandwidthListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Entity\Bandwidth\UpdateBandwidthListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\CancelMessageSendingResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\CreateMessageBatchResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\CreateMessageBulkResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\DownloadBulkResultResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Messaging\MessageListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Sender\SenderListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Sender\UpdateSenderResponse;
use Twin\Sdk\Http\Messaging\V1\Response\ShortLink\ShortLinkListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Tariff\TariffListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Tariff\UpdateTariffResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\AddMessageResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\CreateTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\UpdateTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\DeleteTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\StartTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\PauseTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\ResumeTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\StatusTaskResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Task\TaskListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Template\CreateTemplateResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Template\DeleteTemplateResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Template\TemplateDataResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Template\TemplateListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\Template\UpdateTemplateResponse;
use Twin\Sdk\Http\Messaging\V1\Response\WhiteList\UpdateWhiteListResponse;
use Twin\Sdk\Http\Messaging\V1\Response\WhiteList\WhiteListResponse;

class MessagingHttpClient extends HttpClient
{
    final public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct(
            'https://notify.twin24.ai/api/v1',
            'https://notify.dev.twin24.ai/api/v1',
            $authenticator,
            $client,
        );
    }

    // region Bandwidth

    public function getBandwidthList(BandwidthListRequest $request): BandwidthListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'bandwidth',
            BandwidthListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function updateBandwidthList(mixed $companyId, UpdateBandwidthListRequest $request): UpdateBandwidthListResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "bandwidth/$companyId",
            UpdateBandwidthListResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    // endregion

    // region Messaging

    public function getMessageList(MessageListRequest $request): MessageListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'messages',
            MessageListResponse::class,
            true,
            $request->toArray()
        );
    }

    public function cancelMessageSending(CancelMessageSendingRequest $request): CancelMessageSendingResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            'messages',
            CancelMessageSendingResponse::class,
            true,
            $request->toArray()
        );
    }

    public function createMessageBatch(CreateMessageBatchRequest $request): CreateMessageBatchResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'messages',
            CreateMessageBatchResponse::class,
            true,
            $request->toNestedArray()
        );
    }

    public function createMessageBulk(CreateMessageBulkRequest $request): CreateMessageBulkResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'messages/bulk',
            CreateMessageBulkResponse::class,
            true,
            $request->toArray(true),
            $request->getHeaders()
        );
    }

    public function downloadBulkResult(string $resultId): DownloadBulkResultResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "messages/bulk/$resultId",
            DownloadBulkResultResponse::class,
            true,
        );
    }

    // endregion

    // region PhoneCheck

    public function phoneCheck(PhoneCheckRequest $request): PhoneCheckResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'phoneChecks',
            PhoneCheckResponse::class,
            true,
            $request->toArray(true)
        );
    }

    // endregion

    // region Senders

    public function getSenderList(SenderListRequest $request): SenderListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'senders',
            SenderListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function updateSender(UpdateSenderRequest $request): UpdateSenderResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            'senders',
            UpdateSenderResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    // endregion

    // region ShortLink

    public function getShortLinkList(ShortLinkListRequest $request): ShortLinkListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'shortLinks',
            ShortLinkListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    // endregion

    // region Tariff

    public function getTariffList(TariffListRequest $request): TariffListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'tariffs/sms',
            TariffListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function updateTariff(UpdateTariffRequest $request): UpdateTariffResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            'tariffs/sms',
            UpdateTariffResponse::class,
            true,
            $request->toArray(true)
        );
    }

    // endregion

    // region Task

    public function getTaskList(TaskListRequest $request): TaskListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'tasks',
            TaskListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function createTask(CreateTaskRequest $request): CreateTaskResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'tasks',
            CreateTaskResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    public function updateTask(UpdateTaskRequest $request, string $taskId): UpdateTaskResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "tasks/$taskId",
            UpdateTaskResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    public function deleteTask(string $taskId): DeleteTaskResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "tasks/$taskId",
            DeleteTaskResponse::class,
            true
        );
    }

    public function startTask(string $taskId): StartTaskResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "startedTasks/$taskId",
            StartTaskResponse::class,
            true
        );
    }

    public function pauseTask(string $taskId): PauseTaskResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "pausedTasks/$taskId",
            PauseTaskResponse::class,
            true
        );
    }

    public function resumeTask(string $taskId): ResumeTaskResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "pausedTasks/$taskId",
            ResumeTaskResponse::class,
            true
        );
    }

    public function taskStatus(string $taskId): StatusTaskResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "tasks/$taskId/statuses",
            StatusTaskResponse::class,
            true
        );
    }

    public function addMessages(AddMessageRequest $request, string $taskId): AddMessageResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            "tasks/$taskId",
            AddMessageResponse::class,
            true,
            $request->toArray(true),
            $request->getHeaders()
        );
    }

    // endregion

    // region Template

    public function getTemplateList(TemplateListRequest $request): TemplateListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'templates',
            TemplateListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function getTemplateData(string $templateId): TemplateDataResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            "templates/$templateId",
            TemplateDataResponse::class,
            true
        );
    }

    public function createTemplate(CreateTemplateRequest $request): CreateTemplateResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'templates',
            CreateTemplateResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    public function updateTemplate(UpdateTemplateRequest $request, string $templateId): UpdateTemplateResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "templates/$templateId",
            UpdateTemplateResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }

    public function deleteTemplate(string $templateId): DeleteTemplateResponse|PromiseInterface
    {
        return $this->request(
            'DELETE',
            "templates/$templateId",
            DeleteTemplateResponse::class,
            true
        );
    }

    // endregion

    // region WhiteList

    public function getWhiteList(WhiteListRequest $request): WhiteListResponse|PromiseInterface
    {
        return $this->request(
            'GET',
            'whiteList',
            WhiteListResponse::class,
            true,
            $request->toArray(true)
        );
    }

    public function updateWhiteList(mixed $companyId, UpdateWhiteListRequest $request): UpdateWhiteListResponse|PromiseInterface
    {
        return $this->request(
            'PUT',
            "whiteList/$companyId",
            UpdateWhiteListResponse::class,
            true,
            $request->toNestedArray(true)
        );
    }
}
