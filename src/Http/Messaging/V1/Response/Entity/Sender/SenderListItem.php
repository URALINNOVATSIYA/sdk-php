<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Sender;

use Twin\Sdk\Entity;

class SenderListItem extends Entity
{
    public int $companyId;
    public string $from;
    public string $channel;
    public string $provider;
    public string $price;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'companyId',
            'from',
            'channel',
            'provider',
            'price',
        ], true);
    }
}
