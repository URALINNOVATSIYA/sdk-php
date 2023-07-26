<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Bots\BotDetails;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class BotDetails extends Entity
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
    public ?DateTimeImmutable $deletedAt;
    public ?ViewDetails $viewDetails;
    public bool $debugEnabled;
    public bool $disableNormalization;
    public string $currentNodeId;
    public int $maxRepeatCount;
    public bool $phraseMeasuringDisabled;
    public ?string $defaultNodeId;
    public int $clientTimeout;
    public int $maxCycleCount;
    public ?array $nodes;
    public array $variableFormatters;

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
            'viewDetails' => ['castTo' => '?' . ViewDetails::class],
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