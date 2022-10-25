<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response\Entity;

use Twin\Mapper;

final class AuthenticationTokenData
{
    use Mapper;

    public readonly string $authToken;
    public readonly string $refreshToken;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'authToken' => 'token',
            'refreshToken'
        ]);
    }
}