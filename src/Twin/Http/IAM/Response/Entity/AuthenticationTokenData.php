<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Twin\Entity;

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