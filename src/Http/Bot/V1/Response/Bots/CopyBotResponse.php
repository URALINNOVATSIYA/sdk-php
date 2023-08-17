<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\CopyBot\CopyBot;
use Twin\Sdk\Http\Response;

class CopyBotResponse extends Response
{
    public ?CopyBot $body;

    protected string $castBodyTo = '?' . CopyBot::class;
}