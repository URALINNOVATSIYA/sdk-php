<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Template;

use Twin\Sdk\Entity;

final class CreateTemplate extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
        ]);
    }
}
