<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\User;

use Twin\Sdk\Http\IAM\V1\Response\Entity\User\UserSettings;
use Twin\Sdk\Http\Response;

class UserSettingsResponse extends Response
{
    public ?UserSettings $body;

    protected string $castBodyTo = '?' . UserSettings::class;
}
