<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Messaging;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamInterface;
use Twin\Sdk\Http\Response;

class DownloadBulkResultResponse extends Response
{
    public ?StreamInterface $body;

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
