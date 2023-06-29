<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging;

use Twin\Sdk\Http\Request\QueryRequest;

class MessageListRequest extends QueryRequest
{
    public ?string $status;
    public ?string $channel;
    public array|string|null $id;         // comma-separated list of message identifiers.
    public array|string|null $bulkId;     // comma-separated list of bulk identifiers.
    public array|string|null $groupId;    // comma-separated list of group identifiers.
    public array|string|null $flowId;     // comma-separated list of flow identifiers.
    public array|string|null $taskId;     // comma-separated list of task identifiers.
    public ?string $from;
    public ?string $to;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'status',
            'channel',
            'id',
            'bulkId',
            'groupId',
            'flowId',
            'taskId',
            'from',
            'to',
        ]);
    }
}
