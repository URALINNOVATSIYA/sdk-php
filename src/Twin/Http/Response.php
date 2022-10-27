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

    protected string $castBodyTo = '';

    /**
     * @var string[]
     */
    protected array $__properties = [
        'statusCode',
        'headers',
        'rawBody',
        'error',
        'errorDetails',
        'exception'
    ];

    final public function __construct(
        int $statusCode,
        array $headers,
        string $rawBody,
        mixed $body,
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
        $this->assignProperty('body', $body, $this->castBodyTo);
    }
}