<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\ShortLink;

use Twin\Sdk\Http\Messaging\V1\Response\Entity\ShortLink\ShortLinkCollection;
use Twin\Sdk\Http\Response;

class ShortLinkListResponse extends Response
{
    public ?ShortLinkCollection $body;

    protected string $castBodyTo = '?' . ShortLinkCollection::class;
}
