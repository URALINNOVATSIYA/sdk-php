<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Task;

use DateTimeImmutable;
use Twin\Sdk\Entity;
use Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers\AllowedTimeRanges;

final class TaskListItem extends Entity
{
    public string $id;
    public string $name;
    public string $status;
    public DateTimeImmutable $createdAt;
    public ?DateTimeImmutable $updatedAt = null;
    public AllowedTimeRanges $allowedTimeRanges;
    public int $totalMessageCount;
    public int $totalProcessedMessageCount;
    public int $inProgressMessageCount;
    public int $completedMessageCount;
    public int $progress;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'status',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'allowedTimeRanges' => ['castTo' => '?' . AllowedTimeRanges::class],
            'totalMessageCount',
            'totalProcessedMessageCount',
            'inProgressMessageCount',
            'completedMessageCount',
            'progress',
        ], true);
    }
}
