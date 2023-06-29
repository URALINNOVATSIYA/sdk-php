<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Sender;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\Sender\SenderList;

class SenderCollection extends Entity
{
    public int $count;
    public SenderList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => SenderList::class]
        ]);
    }
}
