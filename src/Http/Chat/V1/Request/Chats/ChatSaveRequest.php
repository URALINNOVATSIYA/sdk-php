<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Chats;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Chats\ReferenceMap;
use Twin\Sdk\Http\Request;

class ChatSaveRequest extends Request
{
    public ?string $name = null;
    public ?string $botId = null;
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
    public ?array $form = null;
    public ?ReferenceMap $references = null;
    public ?array $appearance = null;
    public ?array $results = null;
    public ?int $timerFirstAnswer = null;
    public ?int $timerNextAnswers = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'botId',
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
            'references' => ['castTo' => '?' . ReferenceMap::class],
            'form',
            'appearance',
            'results',
            'timerFirstAnswer',
            'timerNextAnswers',
        ]);
    }
}