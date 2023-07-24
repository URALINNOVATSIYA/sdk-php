<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Task;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Task\CreateTask;
use Twin\Sdk\Http\Response;

class CreateTaskResponse extends Response
{
    public ?CreateTask $body;

    protected string $castBodyTo = '?' . CreateTask::class;
}
