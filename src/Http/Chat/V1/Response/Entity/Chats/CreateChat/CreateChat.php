<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\CreateChat;

use Twin\Sdk\Entity;

class CreateChat extends Entity
{
    public string $id;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id'
        ]);
    }
}