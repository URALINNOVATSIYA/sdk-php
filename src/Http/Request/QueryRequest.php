<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\Request;

use Twin\Sdk\Http\Request;

abstract class QueryRequest extends Request
{
    public ?int $limit = null;
    public ?int $offset = null;
    public ?int $page = null;
    public ?string $sort = null;         // comma-separated list of fields to sort by
    public ?string $group = null;        // comma-separated list of fields to group by
    public ?string $fields = null;       // comma-separated list of response fields
    public ?int $timezone = null;
    public ?string $language = null;
    public ?bool $withoutCount = null;
    public ?bool $withoutItems = null;
    public ?string $offsetField = null;
    public ?string $offsetValue = null;

    /**
     * @param array $properties
     * @param array<string|int, string|array{key?: string, castTo?: string}> $propertyMap
     */
    public function __construct(array $properties, array $propertyMap)
    {
        parent::__construct($properties, array_merge([
            'limit',
            'offset',
            'page',
            'sort',
            'group',
            'fields',
            'timezone',
            'language',
            'withoutCount',
            'withoutItems',
            'offsetField',
            'offsetValue'
        ], $propertyMap));
    }
}