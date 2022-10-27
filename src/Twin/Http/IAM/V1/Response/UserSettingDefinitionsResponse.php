<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Twin\Http\IAM\V1\Response\Entity\SettingsMap;
use Twin\Http\Response;

final class UserSettingDefinitionsResponse extends Response
{
    public ?SettingsMap $body;

    protected string $castBodyTo = '?' . SettingsMap::class;
}