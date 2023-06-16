<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity;

use Twin\Sdk\Entity;

class MessageBatchData extends Entity
{
    public ?string $id;
    public string $bulkId;
    public string $groupId;
    public ?string $flowId;
    public ?string $status;
    public ?string $channel;
    public ?array $error;
//    public ?ErrorMessageBatchData $error;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'id',
            'bulkId',
            'groupId',
            'flowId',
            'status',
            'channel',
            'error',
//            'error' => ['castTo' => '?' . ErrorMessageBatchData::class],
        ]);
    }
}
