<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response;

use Twin\Sdk\Http\IAM\V1\Response\Entity\UserData;
use Twin\Sdk\Http\Response;

final class UserDataResponse extends Response
{
    public ?UserData $body;

    protected string $castBodyTo = '?' . UserData::class;
}