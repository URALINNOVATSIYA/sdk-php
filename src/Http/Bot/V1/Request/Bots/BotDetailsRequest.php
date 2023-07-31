<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Request;

class BotDetailsRequest extends Request
{
    public ?string $fields = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'fields'
        ]);
    }
}