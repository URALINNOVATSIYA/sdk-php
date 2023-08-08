<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Dialogs;

use Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs\DialogDebugInfo\DebugInfo;
use Twin\Sdk\Http\Response;

class DialogDebugInfoResponse extends Response
{
    public ?DebugInfo $body;

    protected string $castBodyTo = '?' . DebugInfo::class;
}