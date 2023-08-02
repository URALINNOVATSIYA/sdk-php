<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotCopy;

use Twin\Sdk\Entity;

class BotCopy extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id'
        ]);
    }
}