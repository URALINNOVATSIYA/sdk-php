<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Chats;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\CreateChat\CreateChat;
use Twin\Sdk\Http\Response;

class CreateChatResponse extends Response
{
    public ?CreateChat $body;

    protected string $castBodyTo = '?' . CreateChat::class;
}