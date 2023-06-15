<?php

namespace Twin\Sdk\Http\Messaging\V1\Response;

use Twin\Sdk\Http\Response;
use Twin\Sdk\Http\Messaging\V1\Response\Entity\TaskCollection;

class TaskListResponse extends Response
{
    public ?TaskCollection $body;

    protected string $castBodyTo = '?' . TaskCollection::class;
}