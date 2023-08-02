<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Facts;

use Twin\Sdk\Http\Request\QueryRequest;

class FactListRequest extends QueryRequest
{
    public ?int $companyId = null;
    public ?string $botId = null;
    public ?string $clientId = null;
    public ?string $context = null;
    public ?string $name = null;
    public ?string $from = null;
    public ?string $to = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'botId',
            'clientId',
            'context',
            'name',
            'from',
            'to'
        ]);
    }
}