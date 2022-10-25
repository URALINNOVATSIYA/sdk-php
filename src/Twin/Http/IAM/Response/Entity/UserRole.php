<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Twin\Mapper;

final class UserRole
{
    use Mapper;

    public readonly string $name;
    public readonly ?int $companyId;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'name',
            'companyId' => 'company_id'
        ]);
    }
}