<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\WhiteList;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\WhiteList\WhiteListCollection;
use Twin\Sdk\Http\Response;

class WhiteListResponse extends Response
{
    public ?WhiteListCollection $body;

    protected string $castBodyTo = '?' . WhiteListCollection::class;
}
