<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatDetails;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ReferenceMap;

class ChatDetails extends Entity
{
    public ?string $id = null;
    public ?int $companyId = null;
    public ?string $botId = null;
    public ?string $botName = null;
    public ?string $name = null;
    public ?int $sessionTtl = null;
    public ?string $operatorsBusyMessage = null;
    public ?int $allowableOperatorIdleTime = null;
    public ?string $sessionReloadBotId = null;
    public ?bool $sessionRatingRequired = null;
    public ?int $sessionRatingTriggerTime = null;
    public ?bool $answerOnFirstClientMessage = null;
    public ?string $eventCallbackUrl = null;
    public ?string $eventCallbackData = null;
    public ?array $notifyOnEvents = null;
    public ?string $fcmServerKey = null;
    public ?string $fcmServiceUrl = null;
    public ?string $knowledgeBase = null;
    public ?array $pushData = null;
    public ?array $messengers = null;
    public ?ReferenceMap $references = null;
    public ?array $form = null;
    public ?array $appearance = null;
    public ?array $results = null;
    public ?int $timerFirstAnswer = null;
    public ?int $timerNextAnswers = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'companyId',
            'botId',
            'botName',
            'name',
            'sessionTtl',
            'operatorsBusyMessage',
            'allowableOperatorIdleTime',
            'sessionReloadBotId',
            'sessionRatingRequired',
            'sessionRatingTriggerTime',
            'answerOnFirstClientMessage',
            'eventCallbackUrl',
            'eventCallbackData',
            'notifyOnEvents',
            'fcmServerKey',
            'fcmServiceUrl',
            'knowledgeBase',
            'pushData',
            'messengers',
            'references' => ['castTo' => '?' . ReferenceMap::class],
            'form',
            'appearance',
            'results',
            'timerFirstAnswer',
            'timerNextAnswers',
        ], true);
    }
}