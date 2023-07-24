<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Tariff;

use Twin\Sdk\Entity;

class TariffCollection extends Entity
{
    public int $count;
    public TariffList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => TariffList::class]
        ]);
    }
}
