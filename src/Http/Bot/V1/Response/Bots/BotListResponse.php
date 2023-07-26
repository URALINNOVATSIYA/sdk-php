<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList\BotListCollection;
use Twin\Sdk\Http\Response;

class BotListResponse extends Response
{
    public ?BotListCollection $body;

    protected string $castBodyTo = '?' . BotListCollection::class;
}