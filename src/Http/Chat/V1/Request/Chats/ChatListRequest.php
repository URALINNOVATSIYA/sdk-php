<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Chats;

use Twin\Sdk\Http\Request\QueryRequest;

class ChatListRequest extends QueryRequest
{
    public ?string $keyword = null;
    public ?string $from = null;
    public ?string $to = null;
    public ?string $name = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'keyword',
            'from',
            'to',
            'name'
        ]);
    }
}