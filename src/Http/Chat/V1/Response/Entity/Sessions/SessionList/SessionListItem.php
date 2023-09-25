<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionList;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionInfo;

class SessionListItem extends SessionInfo
{
    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
    }
}