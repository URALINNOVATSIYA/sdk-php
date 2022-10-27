<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Twin\Http\IAM\V1\Response\Entity\UserSettings;
use Twin\Http\Response;

final class UserSettingsResponse extends Response
{
    public ?UserSettings $body;

    protected string $castBodyTo = '?' . UserSettings::class;
}