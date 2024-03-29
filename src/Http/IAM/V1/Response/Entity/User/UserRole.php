<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity\User;

use Twin\Sdk\Entity;

class UserRole extends Entity
{
    public string $name;
    public ?int $companyId;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'name',
            'companyId' => 'company_id'
        ]);
    }
}
