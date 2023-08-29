<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Sessions;

use Twin\Sdk\Http\Request;

class DeleteSessionRequest extends Request
{
    public ?string $result = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'result'
        ]);
    }
}