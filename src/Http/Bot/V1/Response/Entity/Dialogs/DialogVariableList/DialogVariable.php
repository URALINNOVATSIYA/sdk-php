<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogVariableList;

use Twin\Sdk\Entity;

class DialogVariable extends Entity
{
    public ?SystemMap $system = null;
    public ?ContextMap $context = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'system' => ['castTo' => '?' . SystemMap::class],
            'context' => ['castTo' => '?' . ContextMap::class],
        ]);
    }
}