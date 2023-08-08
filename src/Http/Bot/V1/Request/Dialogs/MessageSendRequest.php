<?php

namespace Twin\Sdk\Http\Bot\V1\Request\Dialogs;

use Twin\Sdk\Http\Request;

class MessageSendRequest extends Request
{
    public string $message;
    public ?array $attachments = null;
    public ?bool $returnAnswerAsync = null;
    public ?string $communicationType = null;
    public ?string $callbackUrl = null;
    public ?string $callbackData = null;
    public ?array $passedBlocks = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'message',
            'attachments',
            'returnAnswerAsync',
            'communicationType',
            'callbackUrl',
            'callbackData',
            'passedBlocks'
        ]);
    }
}