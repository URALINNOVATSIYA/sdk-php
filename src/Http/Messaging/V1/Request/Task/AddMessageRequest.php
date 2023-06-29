<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Task;

use GuzzleHttp\Psr7\Utils;
use Twin\Sdk\Http\Request;

class AddMessageRequest extends Request
{
    protected array $messages = [];

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
        $this->addHeader('Content-Type', 'multipart/form-data');
    }

    public function addFile(string $file): void
    {
        $this->messages[] = [
            'name' => 'messages',
            'contents' => Utils::tryFopen($file, 'r'),
            'filename' => basename($file),
        ];
    }

    public function toArray(bool $ignoreNulls = false): array
    {
        return $this->messages;
    }

    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->toArray($ignoreNulls);
    }
}
