<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging;

use Twin\Sdk\Http\Messaging\V1\Request\Messaging\Entity\MessageList;
use Twin\Sdk\Http\Request;

final class CreateMessageBatchRequest extends Request
{
    public string|int|null $companyId;
    public ?string $taskId;
    public ?string $bulkId;
    public ?MessageList $messages;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'taskId',
            'bulkId',
            'messages' => ['castTo' => '?' . MessageList::class],
        ]);
    }
}
