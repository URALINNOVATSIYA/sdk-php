<?php

declare(strict_types=1);

namespace Twin\Http\Response;

use Throwable;
use Twin\Http\Response;
use Twin\Http\Response\Entity\FileMetadataList;

class UploadFilesResponse extends Response
{
    public ?FileMetadataList $body;

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
        $this->assignProperty('body', $body, '?' . FileMetadataList::class);
    }
}