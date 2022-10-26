<?php

declare(strict_types=1);

namespace Twin\Http\Response;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Throwable;
use Twin\Http\Response;

class DownloadFileResponse extends Response
{
    public ?StreamInterface $body;

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
        $this->assignProperty('body', $body);
    }

    public function toFile(string $path, string $mode = 'w+'): void
    {
        if ($this->body === null) {
            return;
        }
        $dest = new Stream(Utils::tryFopen($path, $mode));
        Utils::copyToStream($this->body, $dest);
        $this->body->close();
        $dest->close();
    }
}