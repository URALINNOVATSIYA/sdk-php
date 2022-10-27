<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Throwable;
use Twin\Http\IAM\V1\Response\Entity\UserData;
use Twin\Http\Response;

final class UserDataResponse extends Response
{
    public ?UserData $body;

    protected string $castBodyTo = '?' . UserData::class;
}