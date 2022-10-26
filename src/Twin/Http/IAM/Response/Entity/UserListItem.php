<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use DateTimeImmutable;
use Twin\Entity;

final class UserListItem extends Entity
{
    public ?int $id = null;
    public ?int $companyId = null;
    public ?string $companyName = null;
    public ?string $firstName = null;
    public ?string $lastName = null;
    public ?string $middleName = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?UserRoleList $roles = null;
    public ?SettingsMap $settings = null;
    public ?DateTimeImmutable $blockedAt = null;
    public ?bool $online = null;
    public ?int $resellerId = null;
    public ?string $resellerName = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'companyId',
            'companyName',
            'firstName',
            'lastName',
            'middleName',
            'email',
            'phone',
            'roles' => ['type' => '?' . UserRoleList::class],
            'settings' => ['type' => '?' . SettingsMap::class],
            'blockedAt' => ['type' => '?' . DateTimeImmutable::class],
            'online',
            'resellerId',
            'resellerName'
        ], true);
    }
}