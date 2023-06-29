<?php

namespace Twin\Sdk\Http\IAM\V1\Request;

use Twin\Sdk\Http\Request\QueryRequest;

final class UserListRequest extends QueryRequest
{
    public ?int $companyId;
    public int|string|null $userId;     // comma-separated list of user identifiers
    public array|string|null $roles;    // comma-separated list of user roles
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
