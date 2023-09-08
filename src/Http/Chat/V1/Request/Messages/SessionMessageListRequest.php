<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Messages;

use Twin\Sdk\Http\Request\QueryRequest;

class SessionMessageListRequest extends QueryRequest
{
    public ?string $from = null;
    public ?string $to = null;
    public ?int $companyId = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'from',
            'to',
            'companyId'
        ]);
    }
}