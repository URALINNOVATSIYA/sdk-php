<?php

namespace Twin\Sdk\Http\Messaging\V1;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Twin\Sdk\Http\Authenticator;
use Twin\Sdk\Http\HttpClient;
use Twin\Sdk\Http\Messaging\V1\Request\CreateMessageBatchRequest;
use Twin\Sdk\Http\Messaging\V1\Request\TaskListRequest;
use Twin\Sdk\Http\Messaging\V1\Response\CreateMessageBatchResponse;
use Twin\Sdk\Http\Messaging\V1\Response\TaskListResponse;

class MessagingHttpClient extends HttpClient
{
    public function __construct(Authenticator $authenticator, ClientInterface $client = null)
    {
        parent::__construct('https://notify.twin24.ai/api/v1', $authenticator, $client);
//        parent::__construct('https://notify.dev.twin24.ai/api/v1', $authenticator, $client);
    }

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

    public function createMessageBatch(CreateMessageBatchRequest $request): CreateMessageBatchResponse|PromiseInterface
    {
        return $this->request(
            'POST',
            'messages',
            CreateMessageBatchResponse::class,
            true,
            $request->toArray()
        );
    }
}
