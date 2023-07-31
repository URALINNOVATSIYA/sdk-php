<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotDetails;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class BotDetails extends Entity
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
    public ?DateTimeImmutable $deletedAt = null;
    public ?array $viewDetails = null;
    public ?bool $debugEnabled = null;
    public ?bool $disableNormalization = null;
    public ?string $currentNodeId = null;
    public ?int $maxRepeatCount = null;
    public ?bool $phraseMeasuringDisabled = null;
    public ?string $defaultNodeId = null;
    public ?int $clientTimeout = null;
    public ?int $maxCycleCount = null;
    public ?array $nodes = null;
    public ?array $variableFormatters = null;

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
            'deletedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'viewDetails',
            'debugEnabled',
            'disableNormalization',
            'currentNodeId',
            'maxRepeatCount',
            'phraseMeasuringDisabled',
            'defaultNodeId',
            'clientTimeout',
            'maxCycleCount',
            'nodes',
            'variableFormatters'
        ], true);
    }
}