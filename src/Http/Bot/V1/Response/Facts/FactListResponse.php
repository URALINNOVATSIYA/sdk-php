<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Facts;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\FactList\FactCollection;
use Twin\Sdk\Http\Response;

class FactListResponse extends Response
{
    public ?FactCollection $body;

    protected string $castBodyTo = '?' . FactCollection::class;
}