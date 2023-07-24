<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Messaging;

use Twin\Sdk\Http\Request;

class CancelMessageSendingRequest extends Request
{
    public array|string|null $id;       // comma-separated list of message identifiers.
    public array|string|null $bulkId;   // comma-separated list of bulk identifiers.
    public array|string|null $groupId;  // comma-separated list of group identifiers.
    public array|string|null $flowId;   // comma-separated list of flow identifiers.

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'id',
            'bulkId',
            'groupId',
            'flowId',
        ]);
    }
}
