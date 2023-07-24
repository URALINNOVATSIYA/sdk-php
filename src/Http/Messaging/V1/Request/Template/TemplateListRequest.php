<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Template;

use Twin\Sdk\Http\Request\QueryRequest;

class TemplateListRequest extends QueryRequest
{
    public ?string $name;
    public ?int $companyId;
    public array|string|null $id; // comma-separated list of template identifiers

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'companyId',
            'id',
        ]);
    }
}
