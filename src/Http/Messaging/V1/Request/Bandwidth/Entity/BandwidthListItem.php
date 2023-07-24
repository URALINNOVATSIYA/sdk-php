<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Bandwidth\Entity;

use Twin\Sdk\Entity;

class BandwidthListItem extends Entity
{
    public float $bandwidth;
    public ?string $channel = null;
    public ?string $provider = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'bandwidth',
            'channel',
            'provider',
        ], true);
    }
}
