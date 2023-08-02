<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\User;

use Twin\Sdk\Http\IAM\V1\Response\Entity\User\UserData;
use Twin\Sdk\Http\Response;

class UserDataResponse extends Response
{
    public ?UserData $body;

    protected string $castBodyTo = '?' . UserData::class;
}
