<?php

namespace Twin\Sdk\Http\Messaging\V1\Request;

use Twin\Sdk\Http\Request\QueryRequest;

final class TaskListRequest extends QueryRequest
{
    public ?string $name;
    public ?string $status;         // Enum TaskStatus: CREATED, RUNNING, PAUSED, COMPLETED
    public ?string $from;
    public ?string $to;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'status',
            'from',
            'to'
        ]);
    }
}