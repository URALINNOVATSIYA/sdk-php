<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging;

use GuzzleHttp\Psr7\Utils;
use Twin\Sdk\Http\Request;

class CreateMessageBulkRequest extends Request
{
    public ?bool $async;

    protected array $messages = [];

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'async',
        ]);
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
        $values = parent::toArray($ignoreNulls);
        foreach ($values as $key => $value) {
            $this->messages[] = [
                'name' => $key,
                'contents' => $value
            ];
        }

        return $this->messages;
    }

    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->toArray($ignoreNulls);
    }
}
