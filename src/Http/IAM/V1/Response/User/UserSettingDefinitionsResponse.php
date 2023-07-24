<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\User;

use Twin\Sdk\Http\IAM\V1\Response\Entity\User\SettingsMap;
use Twin\Sdk\Http\Response;

final class UserSettingDefinitionsResponse extends Response
{
    public ?SettingsMap $body;

    protected string $castBodyTo = '?' . SettingsMap::class;
}
