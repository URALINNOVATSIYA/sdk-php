<?php

namespace Twin\Sdk\Http\Chat\V1\Request\Messages;

use Twin\Sdk\Http\Request;

class CreateClientChatMessageRequest extends Request
{
    public ?string $body = null;
    public ?array $attachments = null;
    public ?string $replyToMessageId = null;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'body',
            'attachments',
            'replyToMessageId'
        ]);
    }
}