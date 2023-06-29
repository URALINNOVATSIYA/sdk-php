<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Messaging;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging\MessageCollection;
use Twin\Sdk\Http\Response;

class MessageListResponse extends Response
{
    public ?MessageCollection $body;

    protected string $castBodyTo = '?' . MessageCollection::class;
}
