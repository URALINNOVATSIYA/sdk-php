<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Dialogs;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogInfo;
use Twin\Sdk\Http\Response;

class SendMessageResponse extends Response
{
    public ?DialogInfo $body;

    protected string $castBodyTo = '?' . DialogInfo::class;
}