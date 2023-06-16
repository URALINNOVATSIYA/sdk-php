<?php

namespace Twin\Sdk\Http\Messaging\V1\Request;

use Twin\Sdk\Http\Request;

class CreateMessageBatchRequest extends Request
{
    public string|int|null $companyId;
    public ?string $taskId;
    public ?string $bulkId;
    public ?array $messages;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'companyId',
            'taskId',
            'bulkId',
            'messages'
        ]);
    }
}
