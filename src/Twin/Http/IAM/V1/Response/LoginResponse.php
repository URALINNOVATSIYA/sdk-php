<?php

declare(strict_types=1);

namespace Twin\Http\IAM\V1\Response;

use Throwable;
use Twin\Http\IAM\V1\Response\Entity\AuthenticationTokenData;
use Twin\Http\Response;

final class LoginResponse extends Response
{
    public AuthenticationTokenData $body;

    public function __construct(
        int $statusCode,
        array $headers,
        string $rawBody,
        mixed $body,
        string $error,
        mixed $errorDetails,
        ?Throwable $exception
    ) {
        parent::__construct($statusCode, $headers, $rawBody, $error, $errorDetails, $exception);
        $this->assignProperty('body', $body, AuthenticationTokenData::class);
    }
}