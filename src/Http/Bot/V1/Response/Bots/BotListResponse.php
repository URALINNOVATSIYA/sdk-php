<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList\BotCollection;
use Twin\Sdk\Http\Response;

class BotListResponse extends Response
{
    public ?BotCollection $body;

    protected string $castBodyTo = '?' . BotCollection::class;
}