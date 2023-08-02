<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Facts;

use Twin\Sdk\Http\Request;

class FactSaveRequest extends Request
{
    public ?string $factId = null;
    public ?int $companyId = null;
    public ?string $botId = null;
    public ?string $clientId = null;
    public ?string $context = null;
    public ?string $name = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'factId',
            'companyId',
            'botId',
            'clientId',
            'context',
            'name'
        ]);
    }
}