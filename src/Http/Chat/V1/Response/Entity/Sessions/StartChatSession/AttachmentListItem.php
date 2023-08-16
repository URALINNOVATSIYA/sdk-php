<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class AttachmentListItem extends Entity
{
    public ?string $id = null;
    public ?bool $isPrivate = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?string $name = null;
    public ?string $baseName = null;
    public ?string $extension = null;
    public ?string $sugestedExtension = null;
    public ?string $path = null;
    public ?int $size = null;
    public ?string $url = null;
    public ?string $downloadLink = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'isPrivate',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'name',
            'baseName',
            'extension',
            'sugestedExtension',
            'path',
            'size',
            'url',
            'downloadLink'
        ], true);
    }
}