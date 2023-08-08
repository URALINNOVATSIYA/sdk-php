<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Dialogs;

use Twin\Sdk\Http\Request\QueryRequest;

class DialogDebugInfoRequest extends QueryRequest
{
    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
    }
}