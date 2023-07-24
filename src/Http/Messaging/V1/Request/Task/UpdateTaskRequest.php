<?php

namespace Twin\Sdk\Http\Messaging\V1\Request\Task;

use Twin\Sdk\Http\Messaging\V1\Entity\TimeRangers\AllowedTimeRanges;
use Twin\Sdk\Http\Request;

class UpdateTaskRequest extends Request
{
    public ?string $name;
    public ?AllowedTimeRanges $allowedTimeRanges;

    public function __construct(array $properties = [])
    {
        parent::__construct($properties, [
            'name',
            'allowedTimeRanges' => ['castTo' => '?' . AllowedTimeRanges::class],
        ]);
    }
}
