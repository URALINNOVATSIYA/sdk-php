<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Facts\FactList;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class FactListItem extends Entity
{
    public ?string $id = null;
    public ?string $botId = null;
    public ?string $clientId = null;
    public ?string $context = null;
    public ?string $name = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $updatedAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'botId',
            'clientId',
            'context',
            'name',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class]
        ], true);
    }
}