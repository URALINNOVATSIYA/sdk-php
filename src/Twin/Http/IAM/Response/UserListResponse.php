<?php

declare(strict_types=1);

namespace Twin\Http\IAM\Response;

use Throwable;
use Twin\Http\IAM\Response\Entity\UserCollection;
use Twin\Http\Response;

final class UserListResponse extends Response
{
    public ?UserCollection $body;

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
        $this->assignProperty('body', $body, '?' . UserCollection::class);
    }
}