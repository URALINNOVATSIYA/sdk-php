<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatList;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class ChatListItem extends Entity
{
    public ?string $id = null;
    public ?string $botId = null;
    public ?string $name = null;
    public ?string $botName = null;
    public ?string $sessionReloadBotId = null;
    public ?string $sessionReloadBotName = null;
    public ?int $sessionTtl = null;
    public ?string $eventCallbackUrl = null;
    public ?string $eventCallbackData = null;
    public ?array $messengers = null;
    public ?int $timerFirstAnswer = null;
    public ?int $timerNextAnswers = null;
    public ?DateTimeImmutable $createdAt = null;
    public ?DateTimeImmutable $updatedAt = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'botId',
            'name',
            'botName',
            'sessionReloadBotId',
            'sessionReloadBotName',
            'sessionTtl',
            'eventCallbackUrl',
            'eventCallbackData',
            'messengers',
            'timerFirstAnswer',
            'timerNextAnswers',
            'createdAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'updatedAt' => ['castTo' => '?' . DateTimeImmutable::class]
        ], true);
    }
}