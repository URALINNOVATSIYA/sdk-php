<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\WhiteList;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class WhiteListCollection extends Entity
{
    public int $companyId;
    public ?WhiteList $items = null;
    public DateTimeImmutable $createdAt;
    public ?DateTimeImmutable $updatedAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'companyId',
            'items' => ['castTo' => '?' . WhiteList::class],
            'createdAt' => ['castTo' => DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}
