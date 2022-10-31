<?php

use Twin\Http\Authenticator;

require_once __DIR__ . '/../vendor/autoload.php';

$authenticator = Authenticator::fromBasic('email', 'password', 24 * 3600);
// $authenticator = Authenticator::fromJwt('auth token', 'refresh token', 3600);

$authenticator->onTokenRefresh(function (string $authToken, string $refreshToken, DateTimeImmutable $expiredAt) {
    echo sprintf(
        "Auth token: %s\n\nRefresh token: %s\n\nExpired at: %s\n\n",
        $authToken,
        $refreshToken,
        $expiredAt->format('c')
    );
});

return $authenticator;