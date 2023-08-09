<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Chats;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatCreate\ChatCreate;
use Twin\Sdk\Http\Response;

class ChatCreateResponse extends Response
{
    public ?ChatCreate $body;

    protected string $castBodyTo = '?' . ChatCreate::class;
}