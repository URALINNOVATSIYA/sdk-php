<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\WhiteList;

use Twin\Sdk\Http\Request\QueryRequest;

class WhiteListRequest extends QueryRequest
{
    public ?string $entity;
    public ?string $channel;
    public ?string $provider;
    public string|int|null $companyId;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'entity',
            'channel',
            'provider',
            'companyId',
        ]);
    }
}
