<?php

namespace Twin\Http\IAM\Request;

use Twin\Http\Request;

final class UserListRequest extends Request\QueryRequest
{
    public ?int $companyId;
    public string|int|null $userId; // comma-separated list of user identifiers
    public ?string $roles;          // comma-separated list of user roles
    public ?bool $online;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'userId',
            'roles',
            'online'
        ]);
    }
}