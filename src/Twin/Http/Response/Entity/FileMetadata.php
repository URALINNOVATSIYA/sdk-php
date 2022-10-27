<?php

declare(strict_types=1);

namespace Twin\Http\Response\Entity;

use DateTimeImmutable;
use Twin\Entity;

class FileMetadata extends Entity
{
    public string $id;
    public bool $isPrivate;
    public DateTimeImmutable $createdAt;
    public string $contentType;
    public string $name;
    public string $baseName;
    public string $extension;
    public string $suggestedExtension;
    public string $path;
    public int $size;
    public ?string $url;
    public ?string $downloadLink;
    public ?int $ownerId;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'isPrivate',
            'createdAt' => ['castTo' => DateTimeImmutable::class],
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