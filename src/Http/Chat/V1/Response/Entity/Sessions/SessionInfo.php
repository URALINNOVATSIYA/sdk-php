<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class SessionInfo extends Entity
{
    public ?string $id = null;
    public ?string $chatId = null;
    public ?bool $markedAsSpam = null;
    public ?string $operatorId = null;
    public ?string $operatorName = null;
    public ?DateTimeImmutable $operatorAssignedAt = null;
    public ?OperatorList $operators = null;
    public ?DateTimeImmutable $lastMessageCreatedAt = null;
    public ?int $ttl = null;
    public ?string $status = null;
    public ?string $channel = null;
    public ?string $messengerType = null;
    public ?DateTimeImmutable $startedAt = null;
    public ?DateTimeImmutable $clientOnlineAt = null;
    public ?DateTimeImmutable $clientOfflineAt = null;
    public ?int $unreadClientMessageCount = null;
    public ?LastMessage $lastMessage = null;
    public ?string $clientId = null;
    public ?string $clientIp = null;
    public ?bool $clientBanned = null;
    public ?LastMessage2 $lastMessage2 = null;
    public ?string $tags = null;
    public ?int $timerFirstAnswer = null;
    public ?int $timerNextAnswers = null;

    public function __construct(array $properties, array $propertyMap)
    {
        $propertyMap = array_merge([
            'id',
            'chatId',
            'markedAsSpam',
            'operatorId',
            'operatorName',
            'operatorAssignedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'operators'  => ['castTo' => '?' . OperatorList::class],
            'lastMessageCreatedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'ttl',
            'status',
            'channel',
            'messengerType',
            'startedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'clientOnlineAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'clientOfflineAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'unreadClientMessageCount',
            'lastMessage' => ['castTo' => '?' . LastMessage::class],
            'clientId',
            'clientIp',
            'clientBanned',
            'lastMessage2' => ['castTo' => '?' . LastMessage2::class],
            'tags',
            'timerFirstAnswer',
            'timerNextAnswers',
        ], $propertyMap);

        $this->assignProperties($properties, $propertyMap,true);
    }
}