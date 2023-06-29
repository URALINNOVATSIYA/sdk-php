<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Auth;

use Twin\Sdk\Http\IAM\V1\Response\Entity\Auth\AuthenticationTokenData;
use Twin\Sdk\Http\Response;

final class LoginResponse extends Response
{
    public AuthenticationTokenData $body;

    protected string $castBodyTo = AuthenticationTokenData::class;
}
