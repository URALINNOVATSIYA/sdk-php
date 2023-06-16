<?php

namespace Twin\Sdk\Http\Messaging\V1\Response\Entity;

use Twin\Sdk\Entity;

class ErrorMessageBatchData extends Entity
{
    public ?string $message;
    public ?string $file;
    public ?string $line;
    public ?array $trace;
//    public ?TraceMap $trace;

    public function __construct(array $properties)
    {
        $this->assignProperties($properties, [
            'message',
            'file',
            'trace',
//            'trace' => ['castTo' =>  '?' . TraceMap::class],
            'line',
        ]);
    }
}
