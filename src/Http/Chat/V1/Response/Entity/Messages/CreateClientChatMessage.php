<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Messages;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class CreateClientChatMessage extends Entity
{
    public ?string $id = null;
    public ?DateTimeImmutable $createdAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}