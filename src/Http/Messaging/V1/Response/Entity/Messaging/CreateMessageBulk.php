<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use Twin\Sdk\Entity;

final class CreateMessageBulk extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
        ]);
    }
}
