<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity;

use Twin\Sdk\Entity;

class TaskCollection extends Entity
{
    public ?int $count;
    public ?TaskList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => '?' . TaskList::class]
        ]);
    }
}