<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList;

use Twin\Sdk\Entity;

class BotCollection extends Entity
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