<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Sessions;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionList\SessionCollection;
use Twin\Sdk\Http\Response;

class SessionListResponse extends Response
{
    public ?SessionCollection $body;

    protected string $castBodyTo = '?' . SessionCollection::class;
}