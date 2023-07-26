<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class BotListItem extends Entity
{
    public string $id;
    public string $name;
    public int $companyId;
    public string $accessType;
    public string $language;
    public string $solver;
    public bool $copyingInProgress;
    public bool $copyingNluAgentCompleted;
    public bool $copyingMediaCompleted;
    public array $viewDetails;
    public DateTimeImmutable $createdAt;
    public DateTimeImmutable $updatedAt;
    public int $updatedBy;
    public ?DateTimeImmutable $deletedAt;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'name',
            'companyId',
            'accessType',
            'language',
            'solver',
            'copyingInProgress',
            'copyingNluAgentCompleted',
            'copyingMediaCompleted',
            'viewDetails',
            'createdAt' => ['castTo' => DateTimeImmutable::class],
            'updatedAt' => ['castTo' => DateTimeImmutable::class],
            'updatedBy',
            'deletedAt' => ['castTo' => '?' . DateTimeImmutable::class]
        ], true);
    }
}