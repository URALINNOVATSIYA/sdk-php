<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Task;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Task\TaskCollection;
use Twin\Sdk\Http\Response;

class TaskListResponse extends Response
{
    public ?TaskCollection $body;

    protected string $castBodyTo = '?' . TaskCollection::class;
}
