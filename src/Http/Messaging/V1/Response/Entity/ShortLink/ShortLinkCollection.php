<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\ShortLink;

use Twin\Sdk\Entity;

class ShortLinkCollection extends Entity
{
    public int $count;
    public ShortLinkList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => ShortLinkList::class]
        ]);
    }
}
