<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use Twin\Sdk\Entity;

class MessageListItem extends Entity
{
    public ?string $body = null;
    public ?array $answers = null;
    public ?ActionMap $actions = null;
    public ?AttachmentList $attachments = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'body',
            'answers',
            'actions' => ['castTo' => '?' . ActionMap::class],
            'attachments' => ['castTo' => '?' . AttachmentList::class]
        ], true);
    }
}