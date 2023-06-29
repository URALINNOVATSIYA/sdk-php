<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Template;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\Channel\ChannelMap;
use Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers\AllowedTimeRanges;

final class TemplateListItem extends Entity
{
    public string $id;
    public string $name;
    public ChannelMap $channels;
    public AllowedTimeRanges $allowedTimeRanges;
    public DateTimeImmutable $createdAt;
    public ?DateTimeImmutable $updatedAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'channels' => ['castTo' => ChannelMap::class],
            'allowedTimeRanges' => ['castTo' => '?' . AllowedTimeRanges::class],
            'createdAt' => ['castTo' => DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}
