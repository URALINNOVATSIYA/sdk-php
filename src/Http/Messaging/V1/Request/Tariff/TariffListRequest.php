<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Tariff;

use Twin\Sdk\Http\Request\QueryRequest;

class TariffListRequest extends QueryRequest
{
    public ?string $network;
    public ?string $iso;
    public string|int|null $companyId;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'network',
            'iso',
            'companyId',
        ]);
    }
}
