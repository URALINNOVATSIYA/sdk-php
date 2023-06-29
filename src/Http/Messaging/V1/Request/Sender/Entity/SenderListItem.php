<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Sender\Entity;

use Twin\Sdk\Entity;

class SenderListItem extends Entity
{
    public string $from;
    public ?string $channel = null;
    public ?string $provider = null;
    public string|int|float $price;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'from',
            'channel',
            'provider',
            'price',
        ], true);
    }
}
