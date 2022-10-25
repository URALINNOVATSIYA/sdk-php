<?php

namespace Twin\Http\Response\Entity;

use DateTimeImmutable;
use Twin\Mapper;

class FileMetadata
{
    use Mapper;

    public readonly string $id;
    public readonly bool $isPrivate;
    public readonly DateTimeImmutable $createdAt;
    public readonly string $contentType;
    public readonly string $name;
    public readonly string $baseName;
    public readonly string $extension;
    public readonly string $suggestedExtension;
    public readonly string $path;
    public readonly int $size;
    public readonly ?string $url;
    public readonly ?string $downloadLink;
    public readonly ?int $ownerId;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'isPrivate',
            'createdAt' => ['type' => DateTimeImmutable::class],
            'contentType',
            'name',
            'baseName',
            'extension',
            'suggestedExtension',
            'path',
            'size',
            'url',
            'downloadLink',
            'ownerId'
        ]);
    }
}