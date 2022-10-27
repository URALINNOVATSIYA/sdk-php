<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Twin\Http\IAM\V1\Response\Entity\AuthenticationTokenData;
use Twin\Http\Response;

final class LoginResponse extends Response
{
    public AuthenticationTokenData $body;

    protected string $castBodyTo = AuthenticationTokenData::class;
}