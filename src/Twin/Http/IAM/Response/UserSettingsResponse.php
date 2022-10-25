<?php

namespace Twin\Http\IAM\Response;

use Throwable;
use Twin\Http\IAM\Response\Entity\UserSettings;
use Twin\Http\Response;
use Twin\Mapper;

final class UserSettingsResponse extends Response
{
    use Mapper;

    public readonly ?UserSettings $body;

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
        $this->assignProperty('body', $body, '?' . UserSettings::class);
    }
}