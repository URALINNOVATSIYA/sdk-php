<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Messages;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Chat\V1\Response\Entity\AttachmentList;

class ReplyMessage extends Entity
{
    public ?string $id = null;
    public ?string $sessionId = null;
    public ?string $userId = null;
    public ?string $botId = null;
    public ?string $body = null;
    public ?string $authorType = null;
    public ?AttachmentList $attachments = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?string $authorName = null;
    public ?string $type = null;
    public ?string $clientId = null;
    public ?array $answers = null;
    public ?array $keyboard = null;
    public ?array $actions = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'sessionId',
            'userId',
            'botId',
            'body',
            'authorType',
            'attachments' => ['castTo' => '?' . AttachmentList::class],
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'authorName',
            'type',
            'clientId',
            'answers',
            'keyboard',
            'actions'
        ], true);
    }
}