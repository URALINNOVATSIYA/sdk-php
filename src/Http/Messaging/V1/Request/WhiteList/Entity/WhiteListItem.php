<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\WhiteList\Entity;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\WhiteList\Values;

class WhiteListItem extends Entity
{
    public string $provider;
    public string $channel;
    public string $entity;
    public ?Values $values = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'provider',
            'channel',
            'entity',
            'values' => ['castTo' => '?' . Values::class],
        ], true);
    }
}
