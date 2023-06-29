<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity\User;

use Twin\Sdk\Entity;

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
            'roles' => ['castTo' => UserRoleList::class],
            'settings' => ['castTo' => SettingsMap::class],
            'avatar' => ['castTo' => '?' . AvatarMetadata::class]
        ]);
    }
}
