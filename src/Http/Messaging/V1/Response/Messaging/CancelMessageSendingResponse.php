<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Messaging;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging\CancelMessageSendingList;
use Twin\Sdk\Http\Response;

class CancelMessageSendingResponse extends Response
{
    public ?CancelMessageSendingList $body;

    protected string $castBodyTo = '?' . CancelMessageSendingList::class;
}
