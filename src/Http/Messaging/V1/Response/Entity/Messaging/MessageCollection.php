<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

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
