<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\StartChatSession;

use Twin\Sdk\Entity;
use Twin\Sdk\Http\Chat\V1\Response\Entity\AttachmentList;

class MessageListItem extends Entity
{
    public ?string $authorId = null;
    public ?string $authorType = null;
    public ?string $body = null;
    public ?ActionMap $actions = null;
    public ?array $answers = null;
    public ?array $keyboard = null;
    public ?AttachmentList $attachments = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'authorId',
            'authorType',
            'body',
            'actions' => ['castTo' => '?' . ActionMap::class],
            'answers',
            'keyboard',
            'attachments' => ['castTo' => '?' . AttachmentList::class]
        ], true);
    }
}