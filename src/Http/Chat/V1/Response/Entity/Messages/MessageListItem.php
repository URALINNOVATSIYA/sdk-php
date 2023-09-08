<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Messages;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Chat\V1\Response\Entity\AttachmentList;

class MessageListItem extends Entity
{
    public ?string $id = null;
    public ?string $authorId = null;
    public ?string $authorType = null;
    public ?string $authorName = null;
    public ?string $type = null;
    public ?string $body = null;
    public ?array $answers = null;
    public ?array $keyboard = null;
    public ?DateTimeImmutable $readAt = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $updatedAt = null;
    public ?AttachmentList $attachments = null;
    public ?string $sessionId = null;
    public ?ReplyMessage $replyTo = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'authorId',
            'authorType',
            'authorName',
            'type',
            'body',
            'answers',
            'keyboard',
            'readAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'attachments' => ['castTo' => '?' . AttachmentList::class],
            'sessionId',
            'replyTo' => ['castTo' => '?' . ReplyMessage::class]
        ], true);
    }
}