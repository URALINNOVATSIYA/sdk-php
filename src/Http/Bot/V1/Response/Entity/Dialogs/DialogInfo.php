<?php

namespace Twin\Sdk\Http\Bot\V1\Response\Entity\Dialogs;

use Twin\Sdk\Entity;

class DialogInfo extends Entity
{
    public string $dialogId;
    public ?string $botId = null;
    public ?string $status = null;
    public string $language;
    public ?array $result = null;
    public ?MessageList $messages = null;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'dialogId',
            'botId',
            'status',
            'language',
            'result',
            'messages' => ['castTo' => '?' . MessageList::class]
        ]);
    }
}