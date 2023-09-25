<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Messages;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Messages\MessageCollection;
use Twin\Sdk\Http\Response;

class SessionMessageListResponse extends Response
{
    public ?MessageCollection $body;

    protected string $castBodyTo = '?' . MessageCollection::class;
}