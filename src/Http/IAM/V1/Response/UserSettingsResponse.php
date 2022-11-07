<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response;

use Twin\Sdk\Http\IAM\V1\Response\Entity\UserSettings;
use Twin\Sdk\Http\Response;

final class UserSettingsResponse extends Response
{
    public ?UserSettings $body;

    protected string $castBodyTo = '?' . UserSettings::class;
}