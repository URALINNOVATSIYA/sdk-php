<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Sender;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\Sender\SenderCollection;
use Twin\Sdk\Http\Response;

class SenderListResponse extends Response
{
    public ?SenderCollection $body;

    protected string $castBodyTo = '?' . SenderCollection::class;
}
