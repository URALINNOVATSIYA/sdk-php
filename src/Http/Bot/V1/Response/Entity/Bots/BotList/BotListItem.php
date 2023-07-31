<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotList;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class BotListItem extends Entity
{
    public ?string $id = null;
    public ?string $name = null;
    public ?int $companyId = null;
    public ?string $accessType = null;
    public ?string $language = null;
    public ?string $solver = null;
    public ?bool $copyingInProgress = null;
    public ?bool $copyingNluAgentCompleted = null;
    public ?bool $copyingMediaCompleted = null;
    public ?array $viewDetails = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $updatedAt = null;
    public ?int $updatedBy = null;
    public ?DateTimeImmutable $deletedAt = null;

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
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedBy',
            'deletedAt' => ['castTo' => '?' . DateTimeImmutable::class]
        ], true);
    }
}