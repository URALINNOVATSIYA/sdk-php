<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Messages;

use Twin\Sdk\Entity;

class MessageCollection extends Entity
{
    public int $count;
    public MessageList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => MessageList::class]
        ]);
    }
}