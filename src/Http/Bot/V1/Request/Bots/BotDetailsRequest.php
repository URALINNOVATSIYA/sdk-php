<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Request\QueryRequest;

class BotDetailsRequest extends QueryRequest
{
    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
    }
}