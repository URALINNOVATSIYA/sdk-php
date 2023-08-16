<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class LastMessage extends Entity
{
    public ?string $id = null;
    public ?string $authorId = null;
    public ?string $authorType = null;
    public ?string $authorName = null;
    public ?string $type = null;
    public ?string $body = null;
    public ?AttachmentList $attachments = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $readAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'authorId',
            'authorType',
            'authorName',
            'type',
            'body',
            'attachments',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'readAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}