<?php

declare(strict_types=1);

namespace Twin\Http\Request;

use GuzzleHttp\Psr7\Utils;
use Twin\Http\Request;

class UploadFilesRequest extends Request
{
    public ?bool $private;
    public ?string $path;
    public ?int $ttl;

    protected array $files = [];

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'private',
            'path',
            'ttl'
        ]);
        $this->addHeader('Content-Type', 'multipart/form-data');
    }

    public function addFile(string $file): void
    {
        $this->files[] = [
            'name' => 'file[]',
            'contents' => Utils::tryFopen($file, 'r'),
            'filename' => basename($file),
        ];
    }

    public function toArray(bool $ignoreNulls = false): array
    {
        $values = parent::toArray($ignoreNulls);
        foreach ($values as $key => $value) {
            $this->files[] = [
                'name' => $key,
                'contents' => $value
            ];
        }
        return $this->files;
    }

    public function toNestedArray(bool $ignoreNulls = false): array
    {
        return $this->toArray($ignoreNulls);
    }
}