<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Bandwidth;

use Twin\Sdk\Entity;

class BandwidthListCollection extends Entity
{
    public int $count;
    public BandwidthList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => BandwidthList::class]
        ]);
    }
}
