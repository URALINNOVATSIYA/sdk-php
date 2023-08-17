<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Facts;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\SaveFact\FactSave;
use Twin\Sdk\Http\Response;

class SaveFactResponse extends Response
{
    public ?FactSave $body;

    protected string $castBodyTo = '?' . FactSave::class;
}