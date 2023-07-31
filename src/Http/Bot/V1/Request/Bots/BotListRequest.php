<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Request\QueryRequest;

class BotListRequest extends QueryRequest
{
    public ?string $accessType = null;
    public ?int $deleted = null;
    public ?int $hasViewDetails = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'accessType',
            'deleted',
            'hasViewDetails'
        ]);
    }
}