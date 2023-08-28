<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class SessionInfo extends Entity
{
    public ?string $id = null;
    public ?string $chatId = null;
    public ?string $name = null;
    public ?bool $markedAsSpam = null;
    public ?int $ttl = null;
    public ?string $operatorId = null;
    public ?string $operatorName = null;
    public ?DateTimeImmutable $operatorAssignedAt = null;
    public ?OperatorList $operators = null;
    public ?string $channel = null;
    public ?string $messengerType = null;
    public ?string $botStatus = null;
    public ?string $status = null;
    public ?DateTimeImmutable $startedAt = null;
    public ?DateTimeImmutable $clientOnlineAt = null;
    public ?DateTimeImmutable $clientOfflineAt = null;
    public ?int $unreadClientMessageCount = null;
    public ?DateTimeImmutable $lastMessageCreatedAt = null;
    public ?array $lastMessage = null;
    public ?string $clientId = null;
    public ?bool $clientBanned = null;
    public ?string $referer = null;
    public ?string $tags = null;
    public ?int $timerFirstAnswer = null;
    public ?int $timerNextAnswers = null;
    public ?string $lastOperatorMessage = null;
    public ?string $firstClientMessageAfterLastOperatorMessage = null;

    public function __construct(array $properties, array $propertyMap)
    {
        $propertyMap = array_merge([
            'id',
            'chatId',
            'name',
            'markedAsSpam',
            'ttl',
            'operatorId',
            'operatorName',
            'operatorAssignedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'operators' => ['castTo' => '?' . OperatorList::class],
            'channel',
            'messengerType',
            'botStatus',
            'status',
            'startedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'clientOnlineAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'clientOfflineAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'unreadClientMessageCount',
            'lastMessageCreatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'lastMessage',
            'clientId',
            'clientBanned',
            'referer',
            'tags',
            'timerFirstAnswer',
            'timerNextAnswers',
            'lastOperatorMessage',
            'firstClientMessageAfterLastOperatorMessage',
        ], $propertyMap);

        $this->assignProperties($properties, $propertyMap,true);
    }
}