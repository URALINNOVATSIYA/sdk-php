<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Sessions;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession\StartChatSession;
use Twin\Sdk\Http\Response;

class StartChatSessionResponse extends Response
{
    public ?StartChatSession $body;

    protected string $castBodyTo = '?' . StartChatSession::class;
}