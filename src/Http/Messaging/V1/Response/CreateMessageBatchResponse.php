<?php

namespace Twin\Sdk\Http\Messaging\V1\Response;

use Twin\Sdk\Http\Response;
use Twin\Sdk\Http\Messaging\V1\Response\Entity\MessageBatchList;

class CreateMessageBatchResponse extends Response
{
    public ?MessageBatchList $body;

    protected string $castBodyTo = '?' . MessageBatchList::class;
}
