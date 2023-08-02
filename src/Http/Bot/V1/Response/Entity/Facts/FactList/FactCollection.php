<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\FactList;

use Twin\Sdk\Entity;

class FactCollection extends Entity
{
    public int $count;
    public FactList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => FactList::class]
        ]);
    }
}