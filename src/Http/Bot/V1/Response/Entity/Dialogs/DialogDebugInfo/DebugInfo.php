<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogDebugInfo;

use Twin\Sdk\Entity;

class DebugInfo extends Entity
{
    public int $count;
    public DebugList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => '?' . DebugList::class]
        ]);
    }
}