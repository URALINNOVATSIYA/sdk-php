<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Messaging;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging\MessageBatchList;
use Twin\Sdk\Http\Response;

class CreateMessageBatchResponse extends Response
{
    public ?MessageBatchList $body;

    protected string $castBodyTo = '?' . MessageBatchList::class;
}
