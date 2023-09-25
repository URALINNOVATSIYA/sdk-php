<?php

namespace Twin\Sdk\Http\Chat\V1\Response\Sessions;

use Twin\Sdk\Http\Chat\V1\Response\Entity\Sessions\SessionDetails\SessionDetails;
use Twin\Sdk\Http\Response;

class SessionDetailsResponse extends Response
{
    public ?SessionDetails $body;

    protected string $castBodyTo = '?' . SessionDetails::class;
}