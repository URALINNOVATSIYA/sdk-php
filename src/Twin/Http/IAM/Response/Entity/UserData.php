<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Twin\Entity;

final class UserData extends Entity
{
    public int $id;
    public int $companyId;
    public string $firstName;
    public string $lastName;
    public string $middleName;
    public string $email;
    public ?string $phone;
    public UserRoleList $roles;
    public SettingsMap $settings;
    public ?AvatarMetadata $avatar;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'companyId',
            'firstName',
            'lastName',
            'middleName',
            'email',
            'phone',
            'roles' => ['type' => UserRoleList::class],
            'settings' => ['type' => SettingsMap::class],
            'avatar' => ['type' => '?' . AvatarMetadata::class]
        ]);
    }
}