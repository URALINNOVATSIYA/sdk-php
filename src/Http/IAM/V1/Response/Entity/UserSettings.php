<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity;

use Twin\Sdk\Entity;

final class UserSettings extends Entity
{
    public SettingsMap $settings;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'settings' => ['castTo' => SettingsMap::class]
        ]);
    }
}