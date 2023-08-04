<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Dialogs;

use Twin\Sdk\Http\Request;

class DialogReloadRequest extends Request
{
    public ?string $botId = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'botId'
        ]);
    }
}