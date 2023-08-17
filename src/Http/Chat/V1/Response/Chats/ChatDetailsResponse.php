<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Chats;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatDetails\ChatDetails;
use Twin\Sdk\Http\Response;

class ChatDetailsResponse extends Response
{
    public ?ChatDetails $body;

    protected string $castBodyTo = '?' . ChatDetails::class;
}