<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\ShortLink;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class ShortLinkListItem extends Entity
{
    public string $id;
    public string $messageId;
    public int $companyId;
    public ?string $taskId = null;
    public string $content;
    public string $shortcut;
    public int $clicks;
    public DateTimeImmutable $createdAt;
    public ?DateTimeImmutable $updatedAt;
    public ?DateTimeImmutable $firstVisitedAt;
    public ?DateTimeImmutable $lastVisitedAt;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'messageId',
            'taskId',
            'companyId',
            'content',
            'shortcut',
            'clicks',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'firstVisitedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'lastVisitedAt' => ['castTo' => '?' . DateTimeImmutable::class],
        ], true);
    }
}
