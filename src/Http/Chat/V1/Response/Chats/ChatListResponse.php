<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Chats;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatList\ChatCollection;
use Twin\Sdk\Http\Response;

class ChatListResponse extends Response
{
    public ?ChatCollection $body;

    protected string $castBodyTo = '?' . ChatCollection::class;
}