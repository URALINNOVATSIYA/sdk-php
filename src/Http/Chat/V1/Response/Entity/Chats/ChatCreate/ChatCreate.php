<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatCreate;

use Twin\Sdk\Entity;

class ChatCreate extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id'
        ]);
    }
}