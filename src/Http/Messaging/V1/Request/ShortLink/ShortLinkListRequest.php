<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\ShortLink;

use Twin\Sdk\Http\Request\QueryRequest;

class ShortLinkListRequest extends QueryRequest
{
    public array|string|null $messageId;   // comma-separated list of message identifiers.
    public array|string|null $taskId;      // comma-separated list of task identifiers.

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'messageId',
            'taskId',
        ]);
    }
}
