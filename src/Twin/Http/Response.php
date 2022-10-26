<?php

declare(strict_types=1);

namespace Twin\Http;

use Throwable;
use Twin\Entity;

abstract class Response extends Entity
{
    public int $statusCode;
    public array $headers;
    public string $rawBody;
    public string $error;
    public mixed $errorDetails;
    public ?Throwable $exception;

    protected array $__properties = [
        'statusCode',
        'headers',
        'rawBody',
        'error',
        'errorDetails',
        'exception'
    ];

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
    }
}