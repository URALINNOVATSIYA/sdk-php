<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogVariableList;

use Twin\Sdk\Entity;

class DialogVariable extends Entity
{
    public array $system;
    public array $context;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'system',
            'context',
        ]);
    }
}