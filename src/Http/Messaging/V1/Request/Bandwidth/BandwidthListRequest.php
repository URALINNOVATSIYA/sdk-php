<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Bandwidth;

use Twin\Sdk\Http\Request\QueryRequest;

class BandwidthListRequest extends QueryRequest
{
    public ?string $channel;
    public ?string $provider;
    public string|int|null $companyId;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'channel',
            'provider',
            'companyId',
        ]);
    }
}
