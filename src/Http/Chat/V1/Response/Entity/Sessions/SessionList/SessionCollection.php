<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionList;

use Twin\Sdk\Entity;

class SessionCollection extends Entity
{
    public int $count;
    public SessionList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => SessionList::class]
        ]);
    }
}