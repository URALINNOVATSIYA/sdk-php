<?php

declare(strict_types=1);

namespace Twin\Http\Exception;

use Throwable;

class MethodNotAllowed extends HttpException
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(405, $message, $code, $previous);
    }
}