<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Request\QueryRequest;

class BotListRequest extends QueryRequest
{
    public ?string $accessType;
    public ?int $deleted;
    public ?int $hasViewDetails;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'accessType',
            'deleted',
            'hasViewDetails'
        ]);
    }
}