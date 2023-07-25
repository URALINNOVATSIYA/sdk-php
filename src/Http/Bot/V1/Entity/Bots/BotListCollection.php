<?php

namespace Twin\Sdk\Http\Bot\V1\Entity\Bots;

use Twin\Sdk\Entity;

class BotListCollection extends Entity
{
    public int $count;
    public BotList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => BotList::class]
        ]);
    }
}