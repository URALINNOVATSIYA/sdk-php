<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Chats;

use Twin\Sdk\Http\Request;

class ChatDetailsRequest extends Request
{
    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
    }
}