<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\FactSave;

use Twin\Sdk\Entity;

class FactSave extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id'
        ]);
    }
}