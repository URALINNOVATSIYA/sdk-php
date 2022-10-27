<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response\Entity;

use Twin\Entity;

final class UserRole extends Entity
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