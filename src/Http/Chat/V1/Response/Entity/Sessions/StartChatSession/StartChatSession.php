<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use DateTimeImmutable;
use Twin\Sdk\Entity;

class StartChatSession extends Entity
{
    public ?string $id = null;
    public ?string $clientId = null;
    public ?DateTimeImmutable $startedAt = null;
    public ?int $ttl = null;
    public ?MessageList $messages = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'clientId',
            'startedAt' => ['castTo' => '?' . DateTimeImmutable::class],
            'ttl',
            'messages' => ['castTo' => '?' . MessageList::class],
        ], true);
    }
}