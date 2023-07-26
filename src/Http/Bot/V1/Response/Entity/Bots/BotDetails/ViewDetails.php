<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotDetails;

use Twin\Sdk\Entity;

class ViewDetails extends Entity
{
    public array $nodes;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'nodes'
        ], true);
    }
}