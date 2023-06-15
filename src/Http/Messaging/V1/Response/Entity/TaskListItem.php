<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity;

use DateTimeImmutable;
use Twin\Sdk\Entity;

final class TaskListItem extends Entity
{
    public ?string $id = null;
    public ?string $name = null;
    public ?string $status = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $updatedAt = null;
    public ?array $allowedTimeRanges = null;
    public ?int $totalMessageCount = null;
    public ?int $totalProcessedMessageCount = null;
    public ?int $inProgressMessageCount = null;
    public ?int $completedMessageCount = null;
    public ?int $progress = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'status',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'allowedTimeRanges',
            'totalMessageCount',
            'totalProcessedMessageCount',
            'inProgressMessageCount',
            'completedMessageCount',
            'progress',
        ], true);
    }
}