<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\WhiteList;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\WhiteList\Values;

class WhiteListItem extends Entity
{
    public string $entity;
    public string $channel;
    public string $provider;
    public Values $values;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'entity',
            'values' => ['castTo' => Values::class],
            'channel',
            'provider',
        ], true);
    }
}
