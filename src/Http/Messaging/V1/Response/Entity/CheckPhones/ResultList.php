<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\CheckPhones;

use Twin\Sdk\Entity;

class ResultList extends Entity
{
    public string $status;
    public int $statusCode;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'status',
            'statusCode',
        ]);
    }
}
