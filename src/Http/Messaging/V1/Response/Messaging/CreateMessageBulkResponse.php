<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Messaging;

use Psr\Http\Message\StreamInterface;
use Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging\CreateMessageBulk;
use Twin\Sdk\Http\Response;

class CreateMessageBulkResponse extends Response
{
    public CreateMessageBulk|StreamInterface|null $body;

    protected string $castBodyTo = CreateMessageBulk::class . '|' . StreamInterface::class . '|null';
}
