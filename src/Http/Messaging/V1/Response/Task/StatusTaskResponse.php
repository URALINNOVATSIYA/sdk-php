<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Task;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Task\StatusTask;
use Twin\Sdk\Http\Response;

class StatusTaskResponse extends Response
{
    public ?StatusTask $body;

    protected string $castBodyTo = '?' . StatusTask::class;
}
