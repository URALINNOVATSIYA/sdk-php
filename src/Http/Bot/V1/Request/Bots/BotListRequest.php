<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Bots;

use Twin\Sdk\Http\Request\QueryRequest;

class BotListRequest extends QueryRequest
{
    public ?string $accessType;
    public ?int $deleted;
    public ?int $hasViewDetails;
    public ?int $companyId;
    public ?bool $withoutCount;
    public ?bool $withoutItems;
    public ?int $limit;
    public ?int $offset;
    public ?int $page;
    public ?string $fields;
    public ?string $sort;
    public ?string $keyword;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'accessType',
            'deleted',
            'hasViewDetails',
            'companyId',
            'withoutCount',
            'withoutItems',
            'limit',
            'offset',
            'page',
            'fields',
            'sort',
            'keyword'
        ]);
    }
}