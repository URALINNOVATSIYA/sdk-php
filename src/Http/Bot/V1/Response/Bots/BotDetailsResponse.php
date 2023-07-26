<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Bots;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotDetails\BotDetails;
use Twin\Sdk\Http\Response;

class BotDetailsResponse extends Response
{
    public ?BotDetails $body;

    protected string $castBodyTo = '?' . BotDetails::class;

}