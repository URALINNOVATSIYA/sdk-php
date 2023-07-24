<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Template;

use Twin\Sdk\Entity;

class TemplateCollection extends Entity
{
    public int $count;
    public TemplateList $items;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'count',
            'items' => ['castTo' => TemplateList::class]
        ]);
    }
}
