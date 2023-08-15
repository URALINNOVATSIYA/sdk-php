<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ChatDetails;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ReferenceMap;

class ChatDetails extends Entity
{
    public string $id;
    public int $companyId;
    public string $botId;
    public string $botName;
    public string $name;
    public int $sessionTtl;
    public string $operatorsBusyMessage;
    public int $allowableOperatorIdleTime;
    public ?string $sessionReloadBotId = null;
    public bool $sessionRatingRequired;
    public int $sessionRatingTriggerTime;
    public bool $answerOnFirstClientMessage;
    public ?string $eventCallbackUrl = null;
    public ?string $eventCallbackData  = null;
    public array $notifyOnEvents;
    public ?string $fcmServerKey = null;
    public ?string $fcmServiceUrl = null;
    public ?string $knowledgeBase = null;
    public array $pushData;
    public array $messengers;
    public ReferenceMap $references;
    public array $form;
    public array $appearance;
    public array $results;
    public int $timerFirstAnswer;
    public int $timerNextAnswers;

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