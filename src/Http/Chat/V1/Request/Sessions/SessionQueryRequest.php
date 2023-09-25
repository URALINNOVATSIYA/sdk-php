<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Sessions;

use Twin\Sdk\Http\Request\QueryRequest;

class SessionQueryRequest extends QueryRequest
{
    public ?string $sessionId = null;
    public ?string $from = null;
    public ?string $to = null;
    public ?bool $markedAsSpam = null;
    public ?string $operatorId = null;
    public ?string $operatorType = null;
    public ?string $botStatus = null;
    public ?string $status = null;
    public ?string $name = null;
    public ?string $chatId = null;
    public ?bool $groupByClientId = null;
    public ?string $tags = null;
    public ?bool $clientBanned = null;
    public ?string $keyword = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'sessionId',
            'from',
            'to',
            'markedAsSpam',
            'operatorId',
            'operatorType',
            'botStatus',
            'status',
            'name',
            'chatId',
            'groupByClientId',
            'tags',
            'clientBanned',
            'keyword',
        ]);
    }
}