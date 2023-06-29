<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Task;

use Twin\Sdk\Entity;

class StatusTask extends Entity
{
    public string $status;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'status',
        ]);
    }
}