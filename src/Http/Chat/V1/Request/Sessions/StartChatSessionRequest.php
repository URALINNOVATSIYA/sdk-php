<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Sessions;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession\ClientMetadataMap;
use Twin\Sdk\Http\Request;

class StartChatSessionRequest extends Request
{
    public ?string $name = null;
    public ?string $botId = null;
    public ?string $sessionId = null;
    public ?string $clientId = null;
    public ?string $clientPhone = null;
    public ?string $clientEmail = null;
    public ?string $clientName = null;
    public ?string $clientFirstName = null;
    public ?string $clientMiddleName = null;
    public ?string $clientLastName = null;
    public ?string $clientExternalId = null;
    public ?string $clientDeviceId = null;
    public ?int $clientTimezone = null;
    public ?ClientMetadataMap $clientMetadata = null;
    public ?string $clientNameForOperator = null;
    public ?string $channel = null;
    public ?string $messengerType = null;
    public ?string $messengerUserId = null;
    public ?int $sessionTtl = null;
    public ?bool $returnAnswerAsync = null;
    public ?string $referer = null;
    public ?array $variables = null;
    public ?string $callbackUrl = null;
    public ?string $callbackData = null;
    public ?string $botNodeId = null;
    public ?string $messageBody = null;
    public ?array $messageAttachments = null;
    public ?string $eventCallbackUrl = null;
    public ?string $eventCallbackData = null;
    public ?array $notifyOnEvents = null;
    public ?string $replyToMessageId = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'botId',
            'sessionId',
            'clientId',
            'clientPhone',
            'clientEmail',
            'clientName',
            'clientFirstName',
            'clientMiddleName',
            'clientLastName',
            'clientExternalId',
            'clientDeviceId',
            'clientTimezone',
            'clientMetadata' => ['castTo' => '?' . ClientMetadataMap::class],
            'clientNameForOperator',
            'channel',
            'messengerType',
            'messengerUserId',
            'sessionTtl',
            'returnAnswerAsync',
            'referer',
            'variables',
            'callbackUrl',
            'callbackData',
            'botNodeId',
            'messageBody',
            'messageAttachments',
            'eventCallbackUrl',
            'eventCallbackData',
            'notifyOnEvents',
            'replyToMessageId'
        ]);
    }
}