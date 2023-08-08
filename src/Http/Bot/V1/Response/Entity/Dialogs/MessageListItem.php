<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs;

use Twin\Sdk\Entity;

class MessageListItem extends Entity
{
    public ?string $body = null;
    public ?array $actions = null;
    public ?array $answers = null;
    public ?array $substitutions = null;
    public ?array $attachments = null;
    public ?array $meta = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'body',
            'actions',
            'answers',
            'substitutions',
            'attachments',
            'meta'
        ], true);
    }
}