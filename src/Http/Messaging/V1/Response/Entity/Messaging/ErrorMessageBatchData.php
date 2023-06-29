<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity\Messaging;

use Twin\Sdk\Entity;

class ErrorMessageBatchData extends Entity
{
    public string $message;
    public string $file;
    public int $line;
    public TraceMap $trace;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'message',
            'file',
            'line',
            'trace' => ['castTo' => TraceMap::class],
        ]);
    }
}
