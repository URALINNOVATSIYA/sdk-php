<?php

declare(strict_types=1);

namespace Twin\Sdk\Http\Exception;

use Throwable;
use RuntimeException;

class HttpException extends RuntimeException
{
    private int $statusCode;

    public function __construct(int $statusCode, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->statusCode = $statusCode;
    }

    public function getHttpStatusCode(): int
    {
        return $this->statusCode;
    }
}