<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\PhoneCheck;

use Twin\Sdk\Http\Request;

class PhoneCheckRequest extends Request
{
    public ?string $checkId = null;
    public ?int $companyId = null;
    public ?string $provider = null;
    public ?array $phones = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'checkId',
            'companyId',
            'provider',
            'phones',
        ]);
    }
}
