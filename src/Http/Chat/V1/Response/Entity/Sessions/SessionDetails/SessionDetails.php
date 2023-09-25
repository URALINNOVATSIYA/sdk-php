<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionDetails;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionInfo;

class SessionDetails extends SessionInfo
{
    public function __construct(array $properties = [])
    {
        parent::__construct($properties, []);
    }
}