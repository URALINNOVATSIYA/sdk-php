<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging\Entity;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\Channel\ChannelMap;
use Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers\AllowedTimeRanges;

class MessageData extends Entity
{
    public ?string $groupId = null;
    public ?string $templateId = null;
    public ?string $callbackUrl = null;
    public ?string $callbackData = null;
    public ?bool $useShortLinks = null;
    public ?bool $validate = null;
    public ?AllowedTimeRanges $allowedTimeRanges = null;
    public ?DateTimeImmutable $sendAt = null;
    public ?DestinationList $destinations = null;
    public ?ChannelMap $channels = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'groupId',
            'templateId',
            'callbackUrl',
            'callbackData',
            'useShortLinks',
            'allowedTimeRanges' => ['castTo' => '?' . AllowedTimeRanges::class],
            'sendAt',
            'destinations' => ['castTo' => '?' . DestinationList::class],
            'channels' => ['castTo' => '?' . ChannelMap::class],
            'validate',
        ], true);
    }
}
