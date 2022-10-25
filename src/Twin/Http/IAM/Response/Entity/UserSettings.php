<?php

namespace Twin\Http\IAM\Response\Entity;

use Twin\Mapper;

final class UserSettings
{
    use Mapper;

    public readonly SettingsMap $settings;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'settings' => ['type' => SettingsMap::class]
        ]);
    }
}