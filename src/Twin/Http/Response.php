<?php

declare(strict_types=1);

namespace Twin\Http;

use Throwable;

abstract class Response
{
    public readonly int $statusCode;
    public readonly array $headers;
    public readonly string $rawBody;
    public readonly string $error;
    public readonly mixed $errorDetails;
    public readonly ?Throwable $exception;

    protected array $properties = [];

    public function __construct(
        int $statusCode,
        array $headers,
        string $rawBody,
        string $error,
        mixed $errorDetails,
        ?Throwable $exception
    ) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->rawBody = $rawBody;
        $this->error = $error;
        $this->errorDetails = $errorDetails;
        $this->exception = $exception;
        $this->properties = [
            'statusCode',
            'headers',
            'rawBody',
            'error',
            'errorDetails',
            'exception'
        ];
    }
}