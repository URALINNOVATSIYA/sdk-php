<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\CopyBot;

use Twin\Sdk\Entity;

class CopyBot extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id'
        ]);
    }
}