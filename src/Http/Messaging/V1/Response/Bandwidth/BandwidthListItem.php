<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Bandwidth;

use Twin\Sdk\Entity;

class BandwidthListItem extends Entity
{
    public int $companyId;
    public ?string $channel;
    public ?string $provider;
    public string $bandwidth;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'companyId',
            'channel',
            'provider',
            'bandwidth',
        ], true);
    }
}
