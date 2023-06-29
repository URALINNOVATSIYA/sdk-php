<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Template;

use Twin\Sdk\Http\Messaging\V1\Entity\Channel\ChannelMap;
use Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers\AllowedTimeRanges;
use Twin\Sdk\Http\Request;

class CreateTemplateRequest extends Request
{
    public string $name;
    public ?ChannelMap $channels;
    public ?AllowedTimeRanges $allowedTimeRanges;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'channels' => ['castTo' => '?' . ChannelMap::class],
            'allowedTimeRanges' => ['castTo' => '?' . AllowedTimeRanges::class],
        ]);
    }
}
