<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Dialogs;

use Twin\Sdk\Http\Request;

class StartDialogRequest extends Request
{
    public string $botId;
    public ?string $dialogId = null;
    public ?int $clientTimezoneOffset = null;
    public ?array $clientMetadata = null;
    public int $ttl;
    public ?string $channelType = null;
    public ?string $communicationType = null;
    public ?string $referer = null;
    public ?string $message = null;
    public ?array $attachments = null;
    public ?string $callbackUrl = null;
    public ?string $callbackData = null;
    public ?array $dialogResultCallbacks = null;
    public ?bool $returnAnswerAsync = null;
    public ?bool $testMode = null;
    public ?string $clientId = null;
    public ?string $clientEmail = null;
    public ?string $clientPhone = null;
    public ?string $clientName = null;
    public ?string $clientNickname = null;
    public ?string $clientExternalId = null;
    public ?string $messengerType = null;
    public ?string $messengerUserId = null;
    public ?array $variables = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'botId',
            'dialogId',
            'clientTimezoneOffset',
            'clientMetadata',
            'ttl',
            'channelType',
            'communicationType',
            'referer',
            'message',
            'attachments',
            'callbackUrl',
            'callbackData',
            'dialogResultCallbacks',
            'returnAnswerAsync',
            'testMode',
            'clientId',
            'clientEmail',
            'clientPhone',
            'clientName',
            'clientNickname',
            'clientExternalId',
            'messengerType',
            'messengerUserId',
            'variables',
        ]);
    }
}