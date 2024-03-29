<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\IAM\V1\Response\Entity\Auth;

use Twin\Sdk\Entity;

final class AuthenticationTokenData extends Entity
{
    public string $authToken;
    public string $refreshToken;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'authToken' => 'token',
            'refreshToken'
        ]);
    }
}
