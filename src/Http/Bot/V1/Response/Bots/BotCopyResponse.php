<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotCopy\BotCopy;
use Twin\Sdk\Http\Response;

class BotCopyResponse extends Response
{
    public ?BotCopy $body;

    protected string $castBodyTo = '?' . BotCopy::class;
}