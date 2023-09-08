<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Messages;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Messages\CreateOperatorChatMessage;
use Twin\Sdk\Http\Response;

class CreateOperatorChatMessageResponse extends Response
{
    public ?CreateOperatorChatMessage $body;

    protected string $castBodyTo = '?' . CreateOperatorChatMessage::class;
}