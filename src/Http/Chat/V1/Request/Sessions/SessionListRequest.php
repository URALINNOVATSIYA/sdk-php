<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Sessions;

use Twin\Sdk\Http\Request\QueryRequest;

class SessionListRequest extends QueryRequest
{
    public ?string $from = null;
    public ?string $to = null;
    public ?string $operatorId = null;
    public ?string $operatorType = null;
    public ?string $status = null;
    public ?string $botStatus = null;
    public ?bool $markedAsSpam = null;
    public ?bool $clientBanned = null;
    public ?string $sessionId = null;
    public ?string $name = null;
    public ?bool $groupByClientId = null;
    public ?string $tags = null;
    public ?string $keyword = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'from',
            'to',
            'operatorId',
            'operatorType',
            'status',
            'botStatus',
            'markedAsSpam',
            'clientBanned',
            'sessionId',
            'name',
            'groupByClientId',
            'tags',
            'keyword',
        ]);
    }
}