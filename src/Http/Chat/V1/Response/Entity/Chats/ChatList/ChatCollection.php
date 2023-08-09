<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatList;

use Twin\Sdk\Entity;

class ChatCollection extends Entity
{
    public int $count;
    public ChatList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => ChatList::class]
        ]);
    }
}