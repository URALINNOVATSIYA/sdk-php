<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Task;

use Twin\Sdk\Entity;

final class CreateTask extends Entity
{
    public ?string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
        ]);
    }
}
