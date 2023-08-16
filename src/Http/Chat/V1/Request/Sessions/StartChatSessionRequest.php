<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Sessions;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession\ClientMetadataMap;
use Twin\Sdk\Http\Request;

class StartChatSessionRequest extends Request
{
    public ?string $name = null;
    public ?string $botId = null;
    public ?string $sessionId = null;
    public ?int $sessionTtl = null;
    public ?string $messengerType = null;
    public ?string $messengerUserId = null;
    public ?string $messageBody = null;
    public ?array $messageAttachments = null;
    public ?string $clientNameForOperator = null;
    public ?string $clientId = null;
    public ?string $clientExternalId = null;
    public ?string $clientPhone = null;
    public ?string $clientEmail = null;
    public ?string $clientDeviceId = null;
    public ?int $clientTimezone = null;
    public ?ClientMetadataMap $clientMetadata = null;
    public ?bool $returnAnswerAsync = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'botId',
            'sessionId',
            'sessionTtl',
            'messengerType',
            'messengerUserId',
            'messageBody',
            'messageAttachments',
            'clientNameForOperator',
            'clientId',
            'clientExternalId',
            'clientPhone',
            'clientEmail',
            'clientDeviceId',
            'clientTimezone',
            'clientMetadata' => ['castTo' => '?' . ClientMetadataMap::class],
            'returnAnswerAsync',
        ]);
    }
}