<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Dialogs;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogVariableList\DialogVariable;
use Twin\Sdk\Http\Response;

class DialogVariableListResponse extends Response
{
    public ?DialogVariable $body;

    protected string $castBodyTo = '?' . DialogVariable::class;
}