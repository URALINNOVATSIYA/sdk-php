<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class OperatorListItem extends Entity
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $type = null;
    public ?DateTimeImmutable $assigned_at = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'type',
            'assigned_at' => ['castTo' => '?' . DateTimeImmutable::class]
        ], true);
    }
}