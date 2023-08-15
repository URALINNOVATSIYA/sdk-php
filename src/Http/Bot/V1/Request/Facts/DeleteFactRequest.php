<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Facts;

use Twin\Sdk\Http\Request;

class DeleteFactRequest extends Request
{
    public ?int $companyId = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId'
        ]);
    }
}