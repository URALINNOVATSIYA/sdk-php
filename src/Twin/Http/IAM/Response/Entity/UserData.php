<?php

namespace Twin\Http\IAM\Response\Entity;

use Twin\Mapper;

final class UserData
{
    use Mapper;

    public readonly int $id;
    public readonly int $companyId;
    public readonly string $firstName;
    public readonly string $lastName;
    public readonly string $middleName;
    public readonly string $email;
    public readonly ?string $phone;
    public readonly UserRoleList $roles;
    public readonly SettingsMap $settings;
    public readonly ?AvatarMetadata $avatar;

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