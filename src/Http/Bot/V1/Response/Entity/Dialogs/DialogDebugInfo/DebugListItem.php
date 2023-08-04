<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogDebugInfo;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class DebugListItem extends Entity
{
    public ?DateTimeImmutable $createdAt = null;
    public ?string $traceId = null;
    public ?array $info = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'traceId',
            'info'
        ]);
    }
}