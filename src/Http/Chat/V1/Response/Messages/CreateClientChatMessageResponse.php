<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Messages;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Messages\CreateClientChatMessage;
use Twin\Sdk\Http\Response;

class CreateClientChatMessageResponse extends Response
{
    public ?CreateClientChatMessage $body;

    protected string $castBodyTo = '?' . CreateClientChatMessage::class;
}